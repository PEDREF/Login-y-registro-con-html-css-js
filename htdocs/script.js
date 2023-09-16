// Esperar a que el DOM esté cargado
document.addEventListener('DOMContentLoaded', function() {
  // Obtener todos los enlaces del documento
  var links = document.getElementsByTagName('a');

  // Agregar evento click a los enlaces
  for (var i = 0; i < links.length; i++) {
    links[i].addEventListener('click', function(event) {
      // Prevenir comportamiento predeterminado de los enlaces
      event.preventDefault();

      // Obtener la URL del enlace
      var url = this.getAttribute('href');

      // Redireccionar a la URL
      window.location.href = url;
    });
  }
});
