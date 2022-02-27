document.onclick = (e) => {
  if (e.target.id === "remove_logo_site") {
    const url = e.target.getAttribute("data-url");
    const image_name = e.target.getAttribute("data-image");

    remove_logo(url, image_name);
  }
};
async function remove_logo(api_url, imagename = "") {
  let response = await fetch(api_url, {
    method: "POST",
    headers: {
      "Content-Type": "text/html"
    },
    body: new URLSearchParams({
      image_remove :  imagename,
    }) ,
  });
  if(response.status === 200){
    let data = response;
    console.log(data) ;
  }
}

// const response = new XMLHttpRequest();
// response.open("POST",url,true) ;
// console.log(response);
// console.log("ok");
// response.send("?action=remove_logo&imagename=image_name");
