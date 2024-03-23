// Function to add value to the display
function addToDisplay(value) {
  // Regular expression to check if the value is an operator
  const regex = /[+*\/-]/;

  // Get the display element
  let display = document.getElementById("display");
  // Add the value to the display
  display.value += value;

  // If the display is not empty, enable the operator buttons
  if (display.value.length > 0) {
    enableOperatorButtons();
  }

  // If the display contains an operator, disable the operator buttons and enable the calculate button
  if (regex.test(display.value)) {
    disableOperatorButtons();
    enableCalculateButton();
  }
}

// Function to calculate the result
function calculate() {
  // Regular expressions to check the operation
  const suma = /[+]/;
  const resta = /[-]/;
  const multiplicacion = /[*]/;
  const division = /[\/]/;

  // Get the value from the display
  const display = document.getElementById("display").value;

  // If the operation is addition
  if (suma.test(display)) {
    // URL for the addition operation
    let url = "http://calculadora.test/suma";
    // Split the display value into two numbers
    const numeros = display.split("+");

    // Create a new FormData object
    let formData = new FormData();
    // Append the numbers and the operation to the FormData object
    formData.append("numeroA", parseInt(numeros[0]));
    formData.append("numeroB", parseInt(numeros[1]));
    formData.append("operacion", "suma");

    // Send a POST request to the server
    fetch(url, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then(
        (data) =>
          // Display the result
          (document.getElementById("display").value = data.message.response)
      )
      .catch((error) => console.error("Error:", error));
  }

  // If the operation is subtraction
  if (resta.test(display)) {
    // URL for the subtraction operation
    let url = "http://calculadora.test/resta";
    // Split the display value into two numbers
    const numeros = display.split("-");

    // Create a new FormData object
    let formData = new FormData();
    // Append the numbers and the operation to the FormData object
    formData.append("numeroA", parseInt(numeros[0]));
    formData.append("numeroB", parseInt(numeros[1]));
    formData.append("operacion", "resta");

    // Send a POST request to the server
    fetch(url, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then(
        (data) =>
          // Display the result
          (document.getElementById("display").value = data.message.response)
      )
      .catch((error) => console.error("Error:", error));
  }

  // If the operation is multiplication
  if (multiplicacion.test(display)) {
    // URL for the multiplication operation
    let url = "http://calculadora.test/multiplicacion";
    // Split the display value into two numbers
    const numeros = display.split("*");

    // Create a new FormData object
    let formData = new FormData();
    // Append the numbers and the operation to the FormData object
    formData.append("numeroA", parseInt(numeros[0]));
    formData.append("numeroB", parseInt(numeros[1]));
    formData.append("operacion", "multiplicacion");

    // Send a POST request to the server
    fetch(url, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then(
        (data) =>
          // Display the result
          (document.getElementById("display").value = data.message.response)
      )
      .catch((error) => console.error("Error:", error));
  }

  // If the operation is division
  if (division.test(display)) {
    // URL for the multiplication operation
    let url = "http://calculadora.test/division";
    // Split the display value into two numbers
    const numeros = display.split("/");

    // Create a new FormData object
    let formData = new FormData();
    // Append the numbers and the operation to the FormData object
    formData.append("numeroA", parseInt(numeros[0]));
    formData.append("numeroB", parseInt(numeros[1]));
    formData.append("operacion", "division");

    // Send a POST request to the server
    fetch(url, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then(
        (data) =>
          // Display the result
          (document.getElementById("display").value = data.message.response)
      )
      .catch((error) => console.error("Error:", error));
  }

  // After the calculation, enable the operator buttons and disable the calculate button
  enableOperatorButtons();
  disableCalculateButton();
}

// Function to clear the display
function clearDisplay() {
  // Clear the display
  document.getElementById("display").value = "";
  // Disable the operator buttons and the calculate button
  disableOperatorButtons();
  disableCalculateButton();
}

// Function to enable the operator buttons
const enableOperatorButtons = () => {
  // Remove the "disabled" attribute from the operator buttons and change their color to white
  document.getElementById("suma").removeAttribute("disabled");
  document.getElementById("menos").removeAttribute("disabled");
  document.getElementById("multiplicacion").removeAttribute("disabled");
  document.getElementById("division").removeAttribute("disabled");

  document.getElementById("suma").style.color = "white";
  document.getElementById("menos").style.color = "white";
  document.getElementById("multiplicacion").style.color = "white";
  document.getElementById("division").style.color = "white";
};

// Function to disable the operator buttons
const disableOperatorButtons = () => {
  // Add the "disabled" attribute to the operator buttons and change their color to black
  document.getElementById("suma").setAttribute("disabled", "");
  document.getElementById("menos").setAttribute("disabled", "");
  document.getElementById("multiplicacion").setAttribute("disabled", "");
  document.getElementById("division").setAttribute("disabled", "");

  document.getElementById("suma").style.color = "black";
  document.getElementById("menos").style.color = "black";
  document.getElementById("multiplicacion").style.color = "black";
  document.getElementById("division").style.color = "black";
};

// Function to enable the calculate button
const enableCalculateButton = () => {
  // Remove the "disabled" attribute from the calculate button and change its color to white
  document.getElementById("calculate").removeAttribute("disabled");
  document.getElementById("calculate").style.color = "white";
};

// Function to disable the calculate button
const disableCalculateButton = () => {
  // Add the "disabled" attribute to the calculate button and change its color to red
  document.getElementById("calculate").setAttribute("disabled", "");
  document.getElementById("calculate").style.color = "red";
};
