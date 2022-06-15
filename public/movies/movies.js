$(document).ready(function () {
  var MOVIES;
  var LATEST_ID;

  $.getJSON("/pages/models/movies.json", function (data) {
    MOVIES = data.movies;
    LATEST_ID = MOVIES[MOVIES.length - 1].id;

    // localStorage.setItem("data", JSON.stringify(MOVIES)); // RESET

    MOVIES = JSON.parse(localStorage.getItem("data"));
    SHOWING();
  });

  $("#addnew").click(function () {
    var title_val = $("#title").val();
    var rating_val = $("#rating").val();
    var last_id = LATEST_ID + 1;

    if (title_val == "") {
      $("#title").addClass("input-error");
    } else {
      $("#title").removeClass("input-error");
    }

    if (rating_val == "" || isNaN(rating_val)) {
      $("#rating").addClass("input-error");
    } else {
      $("#rating").removeClass("input-error");
    }

    if (title_val != "" && rating_val != "" && !isNaN(rating_val)) {
      MOVIES.push({
        id: parseInt(last_id),
        title: title_val,
        rating: parseFloat(rating_val),
      });

      LATEST_ID = MOVIES[MOVIES.length - 1].id;
      localStorage.setItem("data", JSON.stringify(MOVIES));
      console.log(MOVIES);
      SHOWING();
    }
  });

  SHOWING = function (search) {
    $("#table").html(
      `<tr class="bg-blue h-10">
        <th id="_title">Movie Title</th>
        <th id="_rating">Movie Rating</th>
        <th>Action</th>
      </tr>`
    );

    $("#_title").click(function () {
      MOVIES.sort(function (a, b) {
        if (a.title < b.title) return -1;
        if (a.title > b.title) return 1;
        return 0;
      });

      SHOWING(search);
    });

    $("#_rating").click(function () {
      MOVIES.sort(function (a, b) {
        return parseFloat(a.rating) - parseFloat(b.rating);
      });

      SHOWING(search);
    });

    if (search == null) {
      $.each(MOVIES, function (index, data) {
        $("#table").append(`
          <tr id="${data.id}" class="h-8">
            <td>${data.title}</td>
            <td>${data.rating}</td>
            <td><button id="del-${data.id}"
                class="p-1 text-xs rounded-md bg-white focus:outline-none text-darkblue ring-1 ring-blue focus:bg-blue focus:text-white focus:ring-0">
                Delete
              </button></td>
          </tr>
        `);

        $(`#del-${data.id}`).click(function () {
          $(`#${data.id}`).remove();
          MOVIES = $.grep(MOVIES, function (movie) {
            return movie != data;
          });
          localStorage.setItem("data", JSON.stringify(MOVIES));
          console.log(MOVIES);
        });
      });
    } else {
      $.each(MOVIES, function (index, data) {
        var title = data.title.toLowerCase();
        var rating = data.rating.toString();
        if (title.includes(search) || rating.includes(search)) {
          $("#table").append(`
            <tr id="${data.id}" class="h-8">
              <td>${data.title}</td>
              <td>${data.rating}</td>
              <td><button id="del-${data.id}"
                  class="p-1 text-xs rounded-md bg-white focus:outline-none text-darkblue ring-1 ring-blue focus:bg-blue focus:text-white focus:ring-0">
                  Delete
                </button></td>
            </tr>
          `);

          $(`#del-${data.id}`).click(function () {
            $(`#${data.id}`).remove();
            MOVIES = $.grep(MOVIES, function (movie) {
              return movie != data;
            });
            localStorage.setItem("data", JSON.stringify(MOVIES));
            console.log(MOVIES);
          });
        }
      });
    }
  };

  $("#search").on("input", function () {
    var search = $(this).val().toLowerCase();
    SHOWING(search);
    // console.log($(this).val());
  });
});
