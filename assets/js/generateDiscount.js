const home = document.getElementById("Home");

home.addEventListener('click' , function() {
    window.location.href = "homePageAdmin.php";
});

const checkS = document.getElementById("Check-sales");
checkS.addEventListener('click' , function() {
    window.location.href = "checkSalesPage.html";
});

const blog = document.getElementById("Blog");
blog.addEventListener('click' , function() {
    window.location.href = "blogAdmin.html";
});

const logOut = document.getElementById("Log-out");
logOut.addEventListener('click' , function() {
    window.location.href = "index.php";
});



const radioGroup = document.querySelector('.codeValue');
const radioButtons = radioGroup.querySelectorAll('input[type="radio"]');
const startDateInput = document.getElementById("startDate");
const endDateInput = document.getElementById("endDate");
const genBtn = document.getElementById("generateBtn");
const codeF = document.getElementById("generateField");

radioButtons.forEach((radio) => {
  radio.disabled = true;
});

startDateInput.disabled = true;
endDateInput.disabled = true;

let isFirstClick = true;

genBtn.addEventListener('click', function() {  
  if (isFirstClick) {
    radioButtons.forEach((radio) => {
      radio.disabled = false;
    });
    startDateInput.disabled = false;
    endDateInput.disabled = false;
    isFirstClick = false;
  }

  const code = Math.floor(100000 + Math.random() * 900000);
  generateField.value = code
});


  const activateBtn = document.getElementById("activateBtn");
const activationTableBody = document.querySelector("#activationTable tbody");

activateBtn.addEventListener("click", function() {
  const codeInput = document.getElementById("generateField");
  const discountInput = document.querySelector('input[name="discount"]:checked');
  const startDateInput = document.getElementById("startDate");
  const endDateInput = document.getElementById("endDate");

  // Check if all fields are filled
  if (codeInput.value && discountInput && startDateInput.value && endDateInput.value) {
    // Create a new row
    const newRow = document.createElement("tr");
    const codeCell = document.createElement("td");
    const discountCell = document.createElement("td");
    const startDateCell = document.createElement("td");
    const endDateCell = document.createElement("td");

    // Set the cell values
    codeCell.textContent = codeInput.value;
    discountCell.textContent = discountInput.value + "%";
    startDateCell.textContent = startDateInput.value;
    endDateCell.textContent = endDateInput.value;

    // Append cells to the new row
    newRow.appendChild(codeCell);
    newRow.appendChild(discountCell);
    newRow.appendChild(startDateCell);
    newRow.appendChild(endDateCell);

    // Append the new row to the table body
    activationTableBody.appendChild(newRow);

    // Clear the input fields
    codeInput.value = "";
    discountInput.checked = false;
    startDateInput.value = "";
    endDateInput.value = "";

    // Scroll to the bottom of the table
    activationTableBody.scrollTop = activationTableBody.scrollHeight;
  }
});