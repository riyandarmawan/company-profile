// photo profile
const photoProfile = document.querySelector('label[for="profile"] img');
const profile = document.getElementById("profile");

profile.addEventListener("change", function (e) {
    const file = e.target.files[0];
    const reader = new FileReader();

    reader.onloadend = function () {
        photoProfile.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        photoProfile.src = "/assets/img/dashboard/user/default.jpg";
    }
});
