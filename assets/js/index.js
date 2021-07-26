const base = $(".base").data("url");

/* function carrousel_images() {
  $.ajax({
    url: "../src/library/avatarsApi.php",
    type: "post",
    data: { thereArefotos: "adios" },
    success: function (response) {
      let myImages = JSON.parse(response);
      putImagesOnCarrousel(myImages);
    },
  });

  function putImagesOnCarrousel(arrayImages) {
    let owlCarousel = document.getElementById("owl-carousel");

    arrayImages.forEach((image) => {
      let myDiv = document.createElement("img");
      myDiv.setAttribute("class", "item img_carrousel");
      myDiv.setAttribute("src", `${image.photo}`);
      myDiv.setAttribute("alt", `${image.name}`);
      owlCarousel.appendChild(myDiv);
    });
    createCarrousel();
  }
} */

function dynamicNav() {
  path = window.location.href;
  if (path.includes("employee/dashboard")) {
    $(".dashboardTitle").removeClass("text-muted").addClass("text-light");
    $(".employeeTitle").removeClass("text-light").addClass("text-muted");
    $(".userTitle").removeClass("text-light").addClass("text-muted");
  } else if (
    path.includes("employee/employee") ||
    path.includes("Employee/current")
  ) {
    $(".dashboardTitle").removeClass("text-light").addClass("text-muted");
    $(".employeeTitle").removeClass("text-muted").addClass("text-light");
    $(".userTitle").removeClass("text-light").addClass("text-muted");
  } else if (path.includes("user/dashboard")) {
    $(".dashboardTitle").removeClass("text-light").addClass("text-muted");
    $(".employeeTitle").removeClass("text-light").addClass("text-muted");
    $(".userTitle").removeClass("text-muted").addClass("text-light");
  }
}

function createCarrousel() {
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    // nav: true,
    center: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  $(".loop").owlCarousel({
    center: true,
    items: 2,
    loop: true,
    margin: 10,
    responsive: {
      600: {
        items: 4,
      },
    },
  });
}

function editEmployee(row) {
  window.location = `${base}Employee/current/${row.item.id}`;
}

function createNewEmployee() {
  window.location = `${base}Employee/employee`;
}

//EMployees JSGrid

function loadEmployeesList() {
  $.getJSON(`${base}employee/allEmployees`, function (data) {
    $("#employeesList").jsGrid({
      height: "85vh",
      width: "100%",

      editing: false,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 15,
      pageButtonCount: 3,
      deleteConfirm: "Do you confirm you want to delete employee?",

      controller: {
        loadData: function () {
          return $.ajax({
            type: "GET",
            url: `${base}employee/allEmployees`,
            dataType: "json",
          });
        },
        deleteItem: function (item) {
          return $.ajax({
            type: "DELETE",
            data: item,
            url: `${base}employee/deleteEmployee/${item["id"]}`,
          });
        },
      },

      fields: [
        {
          name: "name",
          validate: "required",
          title: "Name",
          type: "text",
          align: "",
          width: 150,
        },
        {
          name: "email",
          validate: "required",
          title: "Email",
          type: "text",
          align: "",
          width: 200,
        },
        {
          name: "age",
          validate: function (value) {
            return value > 0;
          },
          title: "Age",
          type: "text",
          align: "",
          width: 50,
        },
        {
          name: "streetAddress",
          title: "Street No.",
          type: "number",
          align: "",
          width: 100,
        },
        { name: "city", title: "City", type: "text", align: "", width: 100 },
        { name: "state", title: "State", type: "text", align: "", width: 50 },
        {
          name: "postalCode",
          title: "Postal Code",
          type: "number",
          align: "",
          width: 100,
        },
        {
          name: "phoneNumber",
          title: "Phone Number",
          type: "number",
          align: "",
          width: 200,
        },
        {
          type: "control",
          modeSwitchButton: false,
          editButton: false,
          headerTemplate: function () {
            return $("<button>")
              .attr("type", "button")
              .attr("class", "jsgrid-button jsgrid-insert-button")
              .on("click", function () {
                createNewEmployee();
              });
          },
          width: 100,
        },
      ],
      rowClick: function (item) {
        editEmployee(item);
      },
    });
  });
}

//Users JSGrid

function showUserRelations(row) {
  console.log(row.item.userId);
  // window.location = `${base}user/current/${row.item.id}`;
}

function loadUsersList() {
  $.getJSON(`${base}user/allUsers`, function (data) {
    $("#usersList").jsGrid({
      height: "85vh",
      width: "100%",

      inserting: true,
      editing: true,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 15,
      pageButtonCount: 3,
      deleteConfirm: "Do you confirm you want to delete user?",

      controller: {
        loadData: function () {
          return $.ajax({
            type: "GET",
            url: `${base}user/allUsers`,
            dataType: "json",
          });
        },
        insertItem: function (item) {
          return $.ajax({
            type: "POST",
            url: `${base}user/submitUser`,
            data: item,
            success: () => {
              window.location = `${base}user/dashboard`;
            },
          });
        },
        updateItem: function (item) {
          return $.ajax({
            type: "POST",
            data: item,
            url: `${base}user/updateUser/${item["userId"]}`,
            success: (response) => {
              console.log(item["userId"]);
              console.log(response);
            },
          });
        },
        deleteItem: function (item) {
          return $.ajax({
            type: "DELETE",
            data: item,
            url: `${base}user/deleteUser/${item["userId"]}`,
          });
        },
      },

      fields: [
        {
          name: "userId",
          title: "User ID",
          align: "",
          width: 50,
        },
        {
          name: "name",
          validate: "required",
          title: "Name",
          type: "text",
          align: "",
          width: 100,
        },
        {
          name: "email",
          validate: "required",
          title: "Email",
          type: "text",
          align: "",
          width: 200,
        },
        {
          name: "auth",
          title: "Credentials",
          type: "select",
          align: "",
          width: 50,
          items: [
            { Name: "user", Id: "user" },
            { Name: "admin", Id: "admin" },
          ],
          valueField: "Id",
          textField: "Name",
        },
        {
          type: "control",
          modeSwitchButton: false,
          editButton: true,
          width: 100,
        },
      ],
      rowClick: function (item) {
        showUserRelations(item);
      },
    });
  });
}

dynamicNav();
