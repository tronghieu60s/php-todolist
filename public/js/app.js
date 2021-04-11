document.addEventListener("DOMContentLoaded", function () {
  const tableData = document.getElementById("table-data");
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      tableData.innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "controllers/getdata.php", true);
  xmlhttp.send();

  const formCreate = document.getElementById("form-create");
  formCreate.addEventListener("submit", (e) => {
    e.preventDefault();
    const { name, status } = e.target.elements;
    //   formCreate.reset();
  });

  // Reset Button
  const buttonCancel = document.getElementById("button-cancel");
  buttonCancel.addEventListener("click", () => formCreate.reset());
});
