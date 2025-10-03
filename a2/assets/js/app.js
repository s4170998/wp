document.addEventListener('DOMContentLoaded', () => {
  
  const car = document.querySelector('#hero');
  if (car && window.bootstrap) new bootstrap.Carousel(car, { interval: 4000, ride: 'carousel' });

  
  const forms = document.querySelectorAll('form.needs-validation');

  forms.forEach(form => {
    const fileInput = form.querySelector('input[type="file"][name="image"]');
    const allowed = (fileInput?.dataset.allowed || 'jpg,jpeg,png,gif,webp')
      .split(',').map(s => s.trim().toLowerCase()).filter(Boolean);
    const maxBytes = 4 * 1024 * 1024; 

    function validateFile() {
      if (!fileInput) return true;
      fileInput.setCustomValidity('');
      if (fileInput.files && fileInput.files.length) {
        const f = fileInput.files[0];
        const ext = f.name.split('.').pop().toLowerCase();
        if (!allowed.includes(ext)) {
          fileInput.setCustomValidity('Only JPG, JPEG, PNG, GIF or WEBP files are allowed.');
        } else if (f.size > maxBytes) {
          fileInput.setCustomValidity('Image must be 4MB or smaller.');
        }
      }
      return fileInput.checkValidity();
    }

    fileInput?.addEventListener('change', () => {
      validateFile();
      fileInput.reportValidity();
    });

    form.addEventListener('submit', (e) => {
      if (!form.checkValidity() || !validateFile()) {
        e.preventDefault();
        e.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
});
