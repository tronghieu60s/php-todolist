document.addEventListener("DOMContentLoaded", () => {
  loadDataAjax();

  // Reset Button
  const buttonCancel = document.getElementById("button-cancel");
  buttonCancel.addEventListener("click", () => formCreate.reset());

  // Form Create Data
  const formCreate = document.getElementById("form-create");
  formCreate.addEventListener("submit", (e) => {
    e.preventDefault();
    const { name, status } = e.target.elements;
    if (name && status) createDataAjax(name.value, status.value);
    formCreate.reset();
  });
});

const createDataAjax = (name, status) => {
  str = `?name=${name}&status=${status}`;
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      if (xmlhttp.responseText == 1) loadDataAjax();
    }
  };
  xmlhttp.open("GET", "createTodo.php" + str, true);
  xmlhttp.send();
};

const loadDataAjax = () => {
  const tableData = document.getElementById("table-data");
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      tableData.innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET", "getTodo.php", true);
  xmlhttp.send();
};
