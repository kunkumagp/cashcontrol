
//        localStorage.setItem("token", "");
if (!localStorage.getItem("token")) {
    window.location.replace('../index.html');
} else {
    var token = localStorage.getItem("token");

    $.post("http://127.0.0.1:8000/api/checkuser",
        {
            token: token
        },
        function (data) {
            if(data==="expire"){
                localStorage.setItem("token", "");
                window.location.replace('../index.html');
            } else {
                localStorage.setItem("name", data['name']);
                document.getElementById("name").innerHTML = localStorage.getItem("name");
                console.log(localStorage.getItem("name"));
            }

        });
}
