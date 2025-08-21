document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('addSkillForm');
  const fileInput = document.getElementById('image');
  const help = document.getElementById('fileHelp');
  const allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
  const maxBytes = 3 * 1024 * 1024;

  function validateFile() {
    help.classList.add('d-none');
    const file = fileInput.files[0];
    if (!file) return true;
    const ext = file.name.split('.').pop().toLowerCase();
    const typeOk = allowed.includes(ext);
    const sizeOk = file.size <= maxBytes;
    if (!typeOk || !sizeOk) {
      let msg = 'Only image files are allowed (JPG, JPEG, PNG, GIF, WEBP).';
      if (!sizeOk) msg += ' Max size 3MB.';
      help.textContent = msg;
      help.classList.remove('d-none');
      return false;
    }
    return true;
  }

  fileInput.addEventListener('change', validateFile);

  form.addEventListener('submit', (e) => {
    if (!validateFile()) {
      e.preventDefault();
      fileInput.focus();
    }
  });
});
