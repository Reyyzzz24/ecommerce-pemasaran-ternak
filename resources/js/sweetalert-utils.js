/**
 * SweetAlert Utility Functions for E-commerce Ternak Application
 * This file provides consistent SweetAlert functionality across all CRUD operations
 */

// Common SweetAlert configurations
const SweetAlertConfig = {
    // Success alerts
    success: {
        confirmButtonColor: '#28a745',
        timer: 3000,
        timerProgressBar: true
    },

    // Error alerts
    error: {
        confirmButtonColor: '#d33',
        timer: 4000,
        timerProgressBar: true
    },

    // Warning alerts
    warning: {
        confirmButtonColor: '#ffc107',
        cancelButtonColor: '#6c757d',
        showCancelButton: true
    },

    // Info alerts
    info: {
        confirmButtonColor: '#17a2b8',
        timer: 3000,
        timerProgressBar: true
    },

    // Question/Confirmation alerts
    question: {
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#6c757d',
        showCancelButton: true,
        reverseButtons: true
    }
};

// Generic success message
function showSuccess(title, message) {
    return Swal.fire({
        title: title || 'Berhasil!',
        text: message,
        icon: 'success',
        ...SweetAlertConfig.success
    });
}

// Generic error message
function showError(title, message) {
    return Swal.fire({
        title: title || 'Gagal!',
        text: message,
        icon: 'error',
        ...SweetAlertConfig.error
    });
}

// Generic warning message
function showWarning(title, message) {
    return Swal.fire({
        title: title || 'Peringatan!',
        text: message,
        icon: 'warning',
        ...SweetAlertConfig.warning
    });
}

// Generic info message
function showInfo(title, message) {
    return Swal.fire({
        title: title || 'Informasi',
        text: message,
        icon: 'info',
        ...SweetAlertConfig.info
    });
}

// Confirmation dialog
function showConfirm(title, message, confirmText = 'Ya', cancelText = 'Batal') {
    return Swal.fire({
        title: title,
        text: message,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: confirmText,
        cancelButtonText: cancelText,
        ...SweetAlertConfig.question
    });
}

// Delete confirmation
function showDeleteConfirm(itemName, itemType = 'item') {
    return Swal.fire({
        title: 'Konfirmasi Hapus',
        text: `Anda yakin ingin menghapus ${itemType} "${itemName}"? Tindakan ini tidak dapat dibatalkan.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    });
}

// Loading state
function showLoading(title = 'Memproses...', message = 'Mohon tunggu sebentar') {
    return Swal.fire({
        title: title,
        text: message,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
}

// Form submission confirmation
function showFormConfirm(title, message, confirmText = 'Ya, Simpan!', cancelText = 'Batal') {
    return Swal.fire({
        title: title,
        text: message,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: confirmText,
        cancelButtonText: cancelText,
        ...SweetAlertConfig.question
    });
}

// Stock validation
function validateStock(orderQuantity, availableStock, itemName) {
    if (parseInt(orderQuantity) > availableStock) {
        showWarning(
            'Stok Tidak Cukup!',
            `Stok tersedia untuk ${itemName} hanya ${availableStock} ekor, sedangkan Anda memesan ${orderQuantity} ekor.`
        );
        return false;
    }
    return true;
}

// Password validation
function validatePassword(password, confirmPassword) {
    if (password !== confirmPassword) {
        showError(
            'Password Tidak Cocok!',
            'Password dan konfirmasi password harus sama.'
        );
        return false;
    }
    return true;
}

// Form submission handler with SweetAlert
function handleFormSubmission(formId, options = {}) {
    const form = document.getElementById(formId);
    if (!form) return;

    const {
        confirmTitle = 'Konfirmasi',
        confirmMessage = 'Apakah Anda yakin ingin melanjutkan?',
        confirmText = 'Ya, Lanjutkan!',
        cancelText = 'Batal',
        loadingTitle = 'Memproses...',
        loadingMessage = 'Mohon tunggu sebentar',
        validateFunction = null
    } = options;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Basic form validation
        if (!this.checkValidity()) {
            this.reportValidity();
            return;
        }

        // Custom validation if provided
        if (validateFunction && !validateFunction()) {
            return;
        }

        // Show confirmation dialog
        showFormConfirm(confirmTitle, confirmMessage, confirmText, cancelText)
            .then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    showLoading(loadingTitle, loadingMessage);

                    // Submit the form
                    this.submit();
                }
            });
    });
}

// Delete item handler with SweetAlert
function handleDeleteItem(deleteUrl, itemName, itemType = 'item') {
    showDeleteConfirm(itemName, itemType)
        .then((result) => {
            if (result.isConfirmed) {
                // Show loading state
                showLoading('Menghapus...', 'Mohon tunggu sebentar');

                // Create and submit delete form
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';

                form.appendChild(csrfToken);
                form.appendChild(methodField);
                document.body.appendChild(form);
                form.submit();
            }
        });
}

// Initialize SweetAlert utilities globally
window.SweetAlertUtils = {
    showSuccess,
    showError,
    showWarning,
    showInfo,
    showConfirm,
    showDeleteConfirm,
    showLoading,
    showFormConfirm,
    validateStock,
    validatePassword,
    handleFormSubmission,
    handleDeleteItem
};

// Auto-initialize common form handlers
document.addEventListener('DOMContentLoaded', function () {
    // Auto-handle forms with data-sweetalert attribute
    const sweetAlertForms = document.querySelectorAll('[data-sweetalert]');
    sweetAlertForms.forEach(form => {
        const options = JSON.parse(form.dataset.sweetalert || '{}');
        handleFormSubmission(form.id, options);
    });

    // Auto-handle delete buttons with data-delete attribute
    const deleteButtons = document.querySelectorAll('[data-delete]');
    deleteButtons.forEach(button => {
        const deleteData = JSON.parse(button.dataset.delete || '{}');
        button.addEventListener('click', () => {
            handleDeleteItem(
                deleteData.url,
                deleteData.name || 'item',
                deleteData.type || 'item'
            );
        });
    });
});
