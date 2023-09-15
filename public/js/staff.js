/*
*  ------------------- Close Side Bar Menu -----------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const menuBar = document.querySelector('.topbar .content .menu-button i');
    const sideBar = document.querySelector('.sidebar');

    menuBar.addEventListener('click', () => {
        sideBar.classList.toggle('close');
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth < 768) {
            sideBar.classList.add('close');
        }
        else {
            sideBar.classList.remove('close');
        }
    });
});
/*
*  --------------------- End of Close Side Bar Menu -----------------------
*/



/*
*  ------------------ Function Logout ----------------
*/
document.addEventListener('DOMContentLoaded', () => {
    // Sidebar Logout
    const logoutBtn = document.getElementById('logout-button');
    // Logout for topbar
    const topbarLogoutBtn = document.getElementById('logout-button-topbar');
    const logout = document.getElementById('logout-form');

    logoutBtn.addEventListener('click', () => {
        logout.submit();
    });

    topbarLogoutBtn.addEventListener('click', () => {
        logout.submit();
    });
});
/*
*  ------------------ End of Function Logout -------------------
*/




/*
*  ------------------------- Toggle Topbar Profile -----------------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('profile-menu');
    const profileToggle = document.querySelector('.toggle-profile');
    const body = document.querySelector('body');

    toggleBtn.addEventListener('click', (event) => {
        event.stopPropagation();
        profileToggle.classList.toggle('active');
    });

    // Click outside will close the toggle
    body.addEventListener('click', () => {
        profileToggle.classList.remove('active');
    });

    profileToggle.addEventListener('click', (event) => {
        event.stopPropagation();
    });
});
/*
*  ----------------------------- End of Toggle Topbar Profile -------------------------------
*/





/*
*  -------------------- Function for Success Message ---------------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const successMessage = document.querySelector('.success-message');

    if (successMessage) {
        setTimeout(() => {
            successMessage.style.opacity = '0';
            successMessage.remove();
        }, 3000);
    }
});
/*
*  -------------------------- End of Function for Success Message -------------------
*/





/*
*  --------------------- Function for Error Message ------------------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const errorMessage = document.querySelector('.error-message');

    if (errorMessage) {
        setTimeout(() => {
            errorMessage.style.opacity = '0';
            errorMessage.remove();
        }, 3000);
    }
});
/*
*  ------------------------- End of Function for Error Message -------------------------
*/






/*
*  ------------- Drag and Drop Function -----------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const dragArea = document.querySelector('.drag-area');
    const dragText = dragArea.querySelector('.drag-text');
    const imageInput = dragArea.querySelector('.select-image-input');
    let file;

    dragArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        dragArea.classList.add('active');
        dragText.textContent = 'Release to upload file';
    });

    dragArea.addEventListener('dragleave', () => {
        dragArea.classList.remove('active');
        dragText.textContent = 'Drag and drop to upload image';
    });

    dragArea.addEventListener('drop', (event) => {
        event.preventDefault();
        dragArea.classList.remove('active');

        file = event.dataTransfer.files[0];

        //showImage();
    });

    dragArea.addEventListener('click', () => {
        imageInput.click();
    });

    imageInput.addEventListener('change', () => {
        file = imageInput.files[0];
        //showImage();
    });

    function showImage() {
        let fileType = file.type;

        let validExtensions = ['image/jpg', 'image/jpeg', 'image/png', 'image/svg'];

        if (validExtensions.includes(fileType)) {
            let fileReader = new FileReader();
            fileReader.onload = () => {
                let fileUrl = fileReader.result;
                let imgTag = `<img src="${fileUrl}" alt="">`;
                dragArea.innerHTML = imgTag;
            }
            fileReader.readAsDataURL(file);
        }
    }
});
/*
* ----------------- End of Drag and Drop Function ------------------
*/






/*
*  --------------------------- Function for Order Modal ---------------------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const modalPopup = document.querySelector('.modal-edit-order');
    const modalPopupBtns = document.querySelectorAll('.modal-button');
    const closeBtn = document.getElementById('modal-close');
    const cancelBtn = document.querySelector('.modal-edit-order .button-section .cancel');
    const editStatus = document.getElementById('edit-order-status');
    const statusChange = document.querySelector('.modal-edit-order .order-status .data');
    const submitBtn = document.querySelector('.modal-edit-order .button-section input[type="submit"]');

    let orderStatus;

    modalPopupBtns.forEach((modalPopupBtn) => {
        modalPopupBtn.addEventListener('click', () => {
            modalPopup.style.visibility = 'visible';
            modalPopup.style.opacity = '1';

            orderStatus = statusChange.textContent;

            disableSubmitBtn();
        });
    });

    closeBtn.addEventListener('click', () => {
        modalPopup.style.visibility = 'hidden';
        modalPopup.style.opacity = '0';

        // Reset the status to its original value when closing the modal
        statusChange.textContent = orderStatus;
        statusChange.classList.remove('completed');

        disableSubmitBtn();
    });

    cancelBtn.addEventListener('click', () => {
        modalPopup.style.visibility = 'hidden';
        modalPopup.style.opacity = '0';

        // Reset the status to its original value when closing the modal
        statusChange.textContent = orderStatus;
        statusChange.classList.remove('completed');

        disableSubmitBtn();
    });

    editStatus.addEventListener('click', () => {
        statusChange.textContent = 'Completed';
        statusChange.classList.add('completed');

        submitBtn.disabled = false;
    });

    // Function to disable submit button if order status is not completed
    function disableSubmitBtn() {
        if (orderStatus !== 'Completed') {
            submitBtn.disabled = true;
        } else {
            submitBtn.disabled = false;
        }
    }
});
/*
*  ---------------------------------- End of Order Modal ------------------------------------
*/