const SHOW = 5;
let POST = "";
let NUMPAGE = 0;

var paginate = {
    pref: 1,
    maxShow: 4,
    minShow: 0,

    minPage: 1,
    maxPage: 4,

    pagit: document.querySelector("#pagination"),
    news: document.querySelector("#news"),
    next: document.querySelector("#next"),
    prev: document.querySelector("#prev"),
};

shownews = function () {
    paginate.news.innerHTML = "";
    for (var i = paginate.minShow; i < POST.length; i++) {
        if (i >= paginate.minShow && i <= paginate.maxShow) {
            paginate.news.innerHTML += `
			<div id="${POST[i].id}" class="flex shadow space-x-4 h-24 rounded">
                <div><img class="object-cover w-32 h-24 rounded-l" src="./${POST[i].photo}" onerror="this.src='img/default_img.jpg'" alt=""></div>
				<div class="flex-col p-2 space-y-1 justify-center">
					<div class="flex font-title text-xl font-bold max-title capitalize">${POST[i].title}</div>
					<p class="h-[46%] font-sans text-clip overflow-hidden leading-1.1em">
						${POST[i].deskripsi}
					</p>
				</div>
			</div>
			`;
        }
    }
};

var first = 1;
var check = null;
shownum = function () {
    var number = "";
    for (var i = 1; i <= NUMPAGE; i++) {
        if (i >= paginate.minPage && i <= paginate.maxPage) {
            number += `
			<input id="page_${i}" type="radio" name="page" class="hidden c_page"
			${i == check ? 'checked="checked"' : i == first ? 'checked="checked"' : ""}>
      <label value="${i}" id="page" for="page_${i}" class="l_page bg-[#EFEFFF] w-14font-medium px-6 py-0.25em rounded lowercase">
      ${i}
      </label>
			`;
            paginate.pagit.innerHTML = number;
        }
    }
};

numhandle = function () {
    shownum();

    let pages = document.querySelectorAll("#page");
    for (var i = 0; i < pages.length; i++) {
        // console.log(pages[i].textContent);
        pages[i].onclick = function (page) {
            let value = parseInt(page.path[0].attributes.value.value);
            if (paginate.pref < value) {
                paginate.maxShow =
                    paginate.maxShow + SHOW * (value - paginate.pref);
                paginate.minShow = paginate.maxShow - (SHOW - 1);
            } else if (paginate.pref > value) {
                paginate.maxShow =
                    paginate.maxShow - SHOW * (paginate.pref - value);
                paginate.minShow = paginate.maxShow - (SHOW - 1);
            }

            paginate.pref = parseInt(page.path[0].attributes.value.value);
            console.log(paginate.minShow, paginate.maxShow, paginate.pref);

            check = value;
            first = check;
            shownews();
        };
    }
};

goNext = function () {
    if (paginate.maxPage < NUMPAGE) {
        paginate.minPage += 1;
        paginate.maxPage += 1;
        main();
    }
};

goPrev = function () {
    if (paginate.minPage > 1) {
        paginate.maxPage -= 1;
        paginate.minPage -= 1;
        main();
    }
};

main = async function () {
    try {
        await fetch("http://127.0.0.1:8000/api/news")
            .then((response) => response.json())
            .then((response) => {
                console.log(response);
                POST = response;
                NUMPAGE =
                    POST.length % SHOW == 0
                        ? parseInt(POST.length / SHOW)
                        : parseInt(POST.length / SHOW) + 1;
                numhandle();
                shownews();
            });
    } catch (error) {
        await fetch("models/posts.json")
            .then((response) => {
                return response.json();
            })
            .then((response) => {
                POST = response.data;
                NUMPAGE =
                    POST.length % SHOW == 0
                        ? parseInt(POST.length / SHOW)
                        : parseInt(POST.length / SHOW) + 1;
                numhandle();
                shownews();
            });
    }
};

main();
