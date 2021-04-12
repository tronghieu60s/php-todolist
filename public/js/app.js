const URL_GET = "controllers/getTodo.php";
const URL_GET_SEARCH = "controllers/getTodoBySearch.php";
const URL_CREATE = "controllers/createTodo.php";
const URL_DELETE = "controllers/deleteTodo.php";
const URL_EDIT_STATUS = "controllers/editStatusTodo.php";

// Load Data First
document.addEventListener("DOMContentLoaded", () => loadDataAjax());

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

// Search Form
const formSearch = document.getElementById("form-search");
formSearch.addEventListener("submit", (e) => {
  e.preventDefault();
  const { search } = e.target.elements;
  if (search.value === "") loadDataAjax();
  else loadDataSearchAjax(search.value);
});

const loadActionBadgeSwitch = () => {
  const badgeSwitch = document.querySelectorAll(".badge-switch");
  badgeSwitch.forEach((item) => {
    item.addEventListener("click", (e) => {
      const idEdit = e.target.getAttribute("id-todo");
      const statusEdit = e.target.getAttribute("status");
      if (idEdit) editStatusDataAjax(idEdit, statusEdit == 1 ? 0 : 1);
    });
  });
};

const loadActionBtnDelete = () => {
  const btnDelete = document.querySelectorAll(".btn-delete-todo");
  btnDelete.forEach((item) => {
    item.addEventListener("click", (e) => {
      const idDelete = e.target.getAttribute("id-todo");
      if (idDelete) deleteDataAjax(idDelete);
    });
  });
};

const loadDataAjax = async () => {
  const tableData = document.getElementById("table-data");
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      tableData.innerHTML = xmlhttp.responseText;
      loadActionBtnDelete();
      loadActionBadgeSwitch();
    }
  };
  xmlhttp.open("GET", URL_GET, true);
  xmlhttp.send();
};

const loadDataSearchAjax = async (search) => {
  str = `?search=${search}`;
  const tableData = document.getElementById("table-data");
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      tableData.innerHTML = xmlhttp.responseText;
      loadActionBtnDelete();
      loadActionBadgeSwitch();
    }
  };
  xmlhttp.open("GET", URL_GET_SEARCH + str, true);
  xmlhttp.send();
};

const createDataAjax = (name, status) => {
  str = `?name=${name}&status=${status}`;
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      if (xmlhttp.responseText == 1) loadDataAjax();
    }
  };
  xmlhttp.open("GET", URL_CREATE + str, true);
  xmlhttp.send();
};

const deleteDataAjax = (id) => {
  str = `?id=${id}`;
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      if (xmlhttp.responseText == 1) loadDataAjax();
    }
  };
  xmlhttp.open("GET", URL_DELETE + str, true);
  xmlhttp.send();
};

const editStatusDataAjax = (id, status) => {
  str = `?id=${id}&status=${status}`;
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      if (xmlhttp.responseText == 1) loadDataAjax();
    }
  };
  xmlhttp.open("GET", URL_EDIT_STATUS + str, true);
  xmlhttp.send();
};
