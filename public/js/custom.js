//fixed navbar
document.addEventListener("DOMContentLoaded", () => {
    var navfix = document.querySelector("#header");

    if (!navfix) {
        console.error("Element #header tapılmadı!");
    } else {
        document.addEventListener("scroll", () => {
            if (window.scrollY > 400) {
                navfix.classList.add(".active_nav");
            } else {
                navfix.classList.remove(".active_nav");
            }
        });
    }
});

function searchFunction() {
    var query = document.getElementById('search').value;
    console.log("Axtarış: " + query);


}

$("#search").on("keyup", function () {
    let query = $(this).val().trim();
    let resultBox = $(".search-box div.d-none");
    let box = $(".search-box div");
    let baseUrl = window.location.origin;

    if (query.length <= 1) {
        resultBox.addClass("d-none").html("");
        box.addClass("d-none").html("");
        return;
    }

    $.ajax({
        url: "/search",
        method: "GET",
        data: {query: query},
        success: function (data) {
            resultBox.html("");

            if (data.length > 0) {
                resultBox.removeClass("d-none");
                box.removeClass("d-none");

                data.forEach(function (item) {
                    let newsItem = document.createElement("a");
                    newsItem.href = item.title ? baseUrl + "/news/" + item.slug : baseUrl + '/service/' + item.slug;
                    newsItem.style = "width: 100%; display: flex; align-items: center; gap: 10px; color: #000; font-size: 20px; text-decoration: none;";

                    let img = document.createElement("img");
                    img.src = baseUrl + '/storage/' + (item.main_image ?? item.image);
                    img.style = "height: 40px; width: 40px; border-radius: 10px;";
                    img.alt = item.title ?? item.name;

                    let title = document.createElement("span");
                    title.textContent = item.title ?? item.name;

                    newsItem.appendChild(img);
                    newsItem.appendChild(title);

                    resultBox.append(newsItem);

                    let hr = document.createElement("hr");
                    resultBox.append(hr);
                });
            } else {
                resultBox.removeClass("d-none");
                box.removeClass("d-none");
                resultBox.html('<p style="padding: 10px; text-align: center;">Nəticə tapılmadı</p>');
            }
        },
        error: function () {
       console.log("error");
        }
    });
});

$(document).on("click", function (e) {
    if (!$(e.target).closest(".search-box").length) {
        $(".search-box div").addClass("d-none").html("");
    }
});


