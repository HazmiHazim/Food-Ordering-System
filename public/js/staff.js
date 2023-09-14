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
*  ------------------ Logout Side Menu ----------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const logoutBtn = document.getElementById('logout-button');
    logoutBtn.addEventListener('click', () => {
        const logout = document.getElementById('logout-form');
        logout.submit();
    });
});
/*
*  ------------------ End of Logout Side Menu -------------------
*/




/*
*  ------------------------- Toggle Topbar Profile -----------------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('profile-menu');

    toggleBtn.addEventListener('click', () => {
        const profileToggle = document.querySelector('.toggle-profile');
        profileToggle.classList.toggle('active');
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