$("#bt_register").click(function() {
    signup();
});

function signup() {
    var data_frm = new FormData($("form#register")[0]);
    $.ajax({
        url: "api/common.php",
        type: "POST",
        data: data_frm,
        processData: false,
        contentType: false,
        success: function(data) {
            var details = JSON.parse(data);

            if (details["status"] == "200") {
                alert(details["message"]);
                window.location.replace("login.php");

            } else {
                alert(details["message"]);
            }
        },
        error: function() {
            alert("E1: Signup Error.");
            return false;
        }
    });
}


$("#bt_login").click(function() {
    login();
});

function login() {
    var data_frm = new FormData($("form#login")[0]);
    $.ajax({
        url: "api/common.php",
        type: "POST",
        data: data_frm,
        processData: false,
        contentType: false,
        success: function(data) {
            var details = JSON.parse(data);

            if (details["status"] == "200") {
                alert(details["message"]);
                window.location.replace("index.php");
            } else {
                alert(details["message"]);
            }
        },
        error: function() {
            alert("E2: Login Error.");
            return false;
        }
    });
}



function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function matchPassword(password, confirm_password) {
    if (password != confirm_password) {
        return false;
    } else {
        return true;
    }
}

function getUid() {
    // Assuming the uid is stored in a session variable in PHP
    // Modify this line based on how your uid is stored in the PHP session
    return "<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>";
}




// location js 

const GeoLocation = () => {
    const status = document.querySelector('.status');
    const success = (position) => {
        console.log(position)
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        const geoApiUrl = `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en`

        fetch(geoApiUrl)
            .then(res => res.json())
            .then(data => {
                // status.textContent = data.principalSubdivision
                // status.textContent = data.locality
                status.textContent = data.city + "," + data.locality
                    // console.log("Latitude: " + latitude + ", Longitude: " + longitude);
            })

    }
    const error = () => {
        status.textContent = 'Unable to access the location';
    }
    navigator.geolocation.getCurrentPosition(success, error);

}
// document.querySelector('.search-submit').addEventListener('click', GeoLocation);





// profile page change image code 
function openFileInput() {
    document.getElementById('file-input').click();
}

function displayNewImage() {
    var input = document.getElementById('file-input');
    var img = document.getElementById('current-img');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            img.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    } 
}