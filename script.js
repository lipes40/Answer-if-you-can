 function modalCreditos() {
    document.getElementById('modalCreditos').style.display = 'flex';
    setTimeout(() => {
    document.querySelector(".credits-modal").classList.add("active")
    }, 1)
  }

  function fecharModal() {
    
    document.querySelector(".credits-modal").classList.remove("active")

    setTimeout(() => {
        document.getElementById('modalCreditos').style.display = 'none';
    }, 400)
  }

  window.onclick = function(event) {
    const modal = document.getElementById('modalCreditos');
    if (event.target === modal) {
      fecharModal();
    }
  }