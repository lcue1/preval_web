function onlyLettersAndSpaces(input) {
  // Mantener solo letras (mayúsculas, minúsculas, acentuadas) y espacios
  input.value = input.value
  .replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]/g, '') // solo letras y espacios
    .replace(/\s{2,}/g, ' ')                   // no más de un espacio seguido
    .trimStart();    
}

function onlyLetters(input) {
  // Mantener solo letras (mayúsculas, minúsculas, acentuadas) y espacios
  input.value = input.value
  .replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñÜü]/g, '') // solo letras y espacios
    .replace(/\s{2,}/g, ' ')                   // no más de un espacio seguido
    .trimStart();    
}

function onlyPasswordChars(input) {
  // Expresión regular: permite letras, números y caracteres especiales comunes
  input.value = input.value
    .replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñÜü0-9_\-$]/g, '') 
    .replace(/\s/g, ''); // elimina espacios (opcional en contraseñas)
}
