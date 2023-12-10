// my profile
const photoProfile = document.querySelector(".photo-profile");
const profile = document.getElementById("profile");

const buttonRemove = document.getElementById("remove");

profile.addEventListener("change", (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();

    reader.onloadend = () => {
        photoProfile.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    }
});
