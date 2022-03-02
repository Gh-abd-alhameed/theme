
document.onclick = function (e) {
  if (e.target.id === "send-form-contact") {
    let api_url = document.getElementById("url-api").getAttribute("data-url");
    let btn_send = document.getElementById("send-form-contact");
    let action = "maxart_contact_us";
    let email = document.getElementById("email-form-contact").value;
    let name = document.getElementById("name-form-contact").value;
    let phone = document.getElementById("phone-form-contact").value;
    let message = document.getElementById("message-form-contact").value;
    let show_message = document.getElementById('show-msg-form');
    let formdata = new URLSearchParams(new FormData());
    formdata.append("action", action);
    formdata.append("name", name);
    formdata.append("phone", phone);
    formdata.append("email", email);
    formdata.append("message", message);
     
    send_data();
    async function send_data() {
      const response = await fetch(api_url, {
        method: "post",
        headers:{
            'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
        },
        body: formdata,
      });
      const data = await response.json();
      if (data){
          let whatsapp = window.location.href = `https://api.whatsapp.com/send?phone=${phone}&text=${message}`
      }else{
        show_message.style.display = "block";
        show_message.innerHTML = 'There is an error in the data';
      }
    }
    
  }
};
