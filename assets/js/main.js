document.body.onclick = function (e) {
  if (e.target.id == "load_more") {
    let load_more = document.getElementById("load_more");
    let url = e.target.getAttribute("data-url");
    let page = e.target.getAttribute("data-page");
    let numpage = page++;
    let action = "maxart_product_homepage";
    let div_print = document.getElementById("print_data");
    let headers = new Headers();
    headers.append("Content-Type", "application/json");
    let formdata = new URLSearchParams(new FormData());
    formdata.append("action", action);
    formdata.append("page", page);
    get_data_product(url, formdata);
    async function get_data_product() {
      let response = await fetch(url, {
        method: "POST",
        body: formdata,
      });
      if (response.ok) {
        let data = await response.text();
        load_more.setAttribute("data-page" , ++numpage);
        div_print.innerHTML =div_print.innerHTML +  data ;
      }
    }
  }
};
