// logo site api 
document.onclick = (e) => {
  if (e.target.id === "remove_logo_site") {
    let url = e.target.getAttribute("data-url");
    let image_name = e.target.getAttribute("data-image");
    console.log(image_name);
    remove_logo(url, image_name);
  }
};

let msg_delete = document.getElementById('msg-delete');
let msg_error = document.getElementById('msg-error');
async function remove_logo(api_url, imagename = "") {
  let formdata = new URLSearchParams(new FormData());
  formdata.append("action", "maxart_remove_logo");
  formdata.append("imageremove", imagename);
  const response = await fetch(api_url, {
    method: "POST",
    body: formdata,
  });
  if (response.status === 200) {
    msg_delete.style.display = "block";
  }else{
    msg_error.style.display = "block";
  }
}



