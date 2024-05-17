function generateRandomId() {
    return Math.random().toString(36).substr(2, 9); // Genera una cadena de 9 caracteres aleatorios
}

// Obtener el ID del usuario o generar uno nuevo si no existe
function getUserId() {
    let userId = sessionStorage.getItem('user_id'); // Intentar obtener el ID del almacenamiento local

    if (!userId) { // Si no existe, generar uno nuevo
        userId = generateRandomId();
        sessionStorage.setItem('user_id', userId); // Almacenar el ID en el almacenamiento local
    }

    return userId;
}

// Mostrar el ID del usuario en la consola
const userId = getUserId();
console.log("ID del usuario:", userId);