
document.onclick = function(e){
    if (e.target.id === 'send-form-contact'){
        
        let api_url = document.getElementById("url-api").getAttribute('data-url');
        let btn_send = document.getElementById("send-form-contact");
        let action = 'maxart_contact_us';
        let email = document.getElementById('email-form-contact').value;
        let name = document.getElementById('name-form-contact').value;
        let phone = document.getElementById('phone-form-contact').value;
        let message = document.getElementById('message-form-contact').value;
        let formdata = new URLSearchParams(new FormData());
        formdata.append('action',action);
        formdata.append('name',name);
        formdata.append('phone',phone);
        formdata.append('email',email);
        formdata.append('message',message);
        
        async function send_data(){
            const response = await fetch(api_url , {
                method:'post',
                body: formdata,
            }) ;
            if(response.ok){}
            console.log(response.status)
            console.log(response.ok)
            
        }
        send_data();
    }
    
    
}