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
  if (path.search("dashboard") != -1) {
    $(".employeeTitle").removeClass("text-light").addClass("text-muted");
    $(".dashboardTitle").removeClass("text-muted").addClass("text-light");
  } else {
    $(".dashboardTitle").removeClass("text-light").addClass("text-muted");
    $(".employeeTitle").removeClass("text-muted").addClass("text-light");
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

dynamicNav();
