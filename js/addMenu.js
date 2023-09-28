function closeCatCon() {
  document.getElementById("add_menu_con").classList.toggle("active");
}

const addNewCategory = (value) => {
  if (value == "add") {
    document.getElementById("add_menu_con").classList.toggle("active");
  }
};

const addCategory = async () => {
  const category = document.getElementById("add_new_menu").value;
  alert("Your Category : " + category);
  $.ajax({
    method: "POST",
    url: "../auth/server.php",
    data: { name: "AddNewCategory", category },
    success: function (response) {
      console.log(response);
      if (response == "success") {
        alert("Category Added Successfull !!");
        document.getElementById("add_menu_con").classList.toggle("active");
        // reload the page
        location.reload();
      }
      if (response == "error") {
        alert("Category Already Exists !!");
      }
    },
    error: function (xhr, status, error) {
      console.error(xhr);
    },
  });
};
