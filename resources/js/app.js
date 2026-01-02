/**
 * Employee Digital Hub - Main JavaScript
 */

// Initialize app when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  initializeApp();
});

/**
 * Initialize application components
 */
function initializeApp() {
  initializeSidebar();
  initializeToasts();
  initializeModals();
  initializeDropdowns();
}

/**
 * Sidebar toggle functionality
 */
function initializeSidebar() {
  const sidebarToggle = document.getElementById('sidebar-toggle');
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('main-content');

  if (sidebarToggle && sidebar) {
    sidebarToggle.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      mainContent?.classList.toggle('ml-0');
      mainContent?.classList.toggle('ml-64');
    });
  }
}

/**
 * Toast notification system
 */
function initializeToasts() {
  window.showToast = function(message, type = 'info', duration = 3000) {
    const container = document.getElementById('toast-container') || createToastContainer();

    const alertClasses = {
      success: 'alert-success',
      error: 'alert-error',
      warning: 'alert-warning',
      info: 'alert-info',
    };

    const toast = document.createElement('div');
    toast.className = `alert ${alertClasses[type] || 'alert-info'} shadow-lg`;
    toast.innerHTML = `<span>${message}</span>`;

    container.appendChild(toast);

    setTimeout(() => {
      toast.classList.add('opacity-0', 'transition-opacity');
      setTimeout(() => toast.remove(), 300);
    }, duration);
  };
}

function createToastContainer() {
  const container = document.createElement('div');
  container.id = 'toast-container';
  container.className = 'toast toast-top toast-end z-50';
  document.body.appendChild(container);
  return container;
}

/**
 * Modal functionality
 */
function initializeModals() {
  // Close modal on backdrop click
  document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.close?.() || modal.classList.remove('modal-open');
      }
    });
  });

  // Close modal on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      document.querySelectorAll('.modal.modal-open, dialog.modal[open]').forEach(modal => {
        modal.close?.() || modal.classList.remove('modal-open');
      });
    }
  });
}

/**
 * Dropdown functionality
 */
function initializeDropdowns() {
  // Close dropdowns when clicking outside
  document.addEventListener('click', (e) => {
    if (!e.target.closest('.dropdown')) {
      document.querySelectorAll('.dropdown-content').forEach(dropdown => {
        dropdown.classList.add('hidden');
      });
    }
  });
}

/**
 * Form validation helper
 */
window.validateForm = function(formElement) {
  const inputs = formElement.querySelectorAll('[required]');
  let isValid = true;

  inputs.forEach(input => {
    if (!input.value.trim()) {
      input.classList.add('input-error');
      isValid = false;
    } else {
      input.classList.remove('input-error');
    }
  });

  return isValid;
};

/**
 * Loading state helper
 */
window.setLoading = function(element, loading = true) {
  if (loading) {
    element.classList.add('loading');
    element.disabled = true;
  } else {
    element.classList.remove('loading');
    element.disabled = false;
  }
};

/**
 * Confirm dialog helper
 */
window.confirmAction = function(message = 'Are you sure?') {
  return new Promise((resolve) => {
    const modal = document.createElement('dialog');
    modal.className = 'modal modal-bottom sm:modal-middle';
    modal.innerHTML = `
      <div class="modal-box">
        <h3 class="font-bold text-lg">Konfirmasi</h3>
        <p class="py-4">${message}</p>
        <div class="modal-action">
          <button class="btn btn-ghost" data-action="cancel">Batal</button>
          <button class="btn btn-primary" data-action="confirm">Ya, Lanjutkan</button>
        </div>
      </div>
      <form method="dialog" class="modal-backdrop">
        <button>close</button>
      </form>
    `;

    document.body.appendChild(modal);
    modal.showModal();

    modal.querySelector('[data-action="confirm"]').addEventListener('click', () => {
      modal.close();
      modal.remove();
      resolve(true);
    });

    modal.querySelector('[data-action="cancel"]').addEventListener('click', () => {
      modal.close();
      modal.remove();
      resolve(false);
    });
  });
};
