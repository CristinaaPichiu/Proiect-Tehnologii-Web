// Citirea datelor dintr-un fișier JSON
function readDataFromFile(file) {
    return new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();
      xhr.overrideMimeType("application/json");
      xhr.open("GET", file, true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          resolve(JSON.parse(xhr.responseText));
        }
      };
      xhr.onerror = function () {
        reject(xhr.statusText);
      };
      xhr.send();
    });
  }
  
  // Crearea graficului folosind datele din fișier
  function createChart(data) {
    // Utilizați datele pentru a genera graficul dorit
    // Aici puteți folosi o librărie sau un framework precum Chart.js, D3.js sau alte opțiuni disponibile
  
    // Exemplu simplu de creare a unui grafic folosind datele
    const chartContainer = document.querySelector("chartContainer");
    data.forEach((entry) => {
      const bar = document.createElement("div");
      bar.style.width = entry.value + "px";
      bar.style.height = "20px";
      bar.style.backgroundColor = "blue";
      chartContainer.appendChild(bar);
    });
  }
  
  // Apelarea funcțiilor pentru a citi datele din fișier și a crea graficul
  function generateGraph(){
  readDataFromFile("../../../CondamnariSexe.json")
    .then((data) => {
      createChart(data);
    })
    .catch((error) => {
      console.error("A apărut o eroare la citirea fișierului:", error);
    });
}
  

const form = document.getElementById('myForm');

form.addEventListener('submit', function(event) {
  event.preventDefault(); // Previne comportamentul implicit de trimitere a formularului
  const file = document.getElementById('myFile').files[0]; // Preiați fișierul selectat
  generateGraph(file); // Apelați funcția generateGraph cu fișierul selectat
});
