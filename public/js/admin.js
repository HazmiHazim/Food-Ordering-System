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
*  ------------------- Close Side Bar Menu -----------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const menuBar = document.querySelector('.top-bar nav .bx.bx-menu');
    const sideBar = document.querySelector('.sidebar');
    const section = document.querySelector('section');

    menuBar.addEventListener('click', () => {
        sideBar.classList.toggle('close');

        if (sideBar.classList.contains('close')) {
            section.style.width = "calc(100% - 60px)";
            section.style.left = "60px";
        } else {
            section.style.width = "calc(100% - 230px)";
            section.style.left = "230px";
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth < 768) {
            sideBar.classList.add('close');
            section.style.width = "calc(100% - 60px)";
            section.style.left = "60px";
        }
        else {
            sideBar.classList.remove('close');
            section.style.width = "calc(100% - 230px)";
            section.style.left = "230px";
        }
    });
});
/*
*  --------------------- End of Close Side Bar Menu -----------------------
*/




/*
*  ----------------------- Dark Mode ---------------------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const toggler = document.getElementById('theme-toggle');

    toggler.addEventListener('change', () => {
        const isChecked = toggler.checked;
        if (isChecked) {
            document.body.classList.add('dark');
        }
        else {
            document.body.classList.remove('dark');
        }
    });
});
/*
*  ------------------------- End of Dark Mode -------------------------
*/




/*
*  ------------------------------ Dropdown Function to Select ---------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const dropdowns = document.querySelectorAll('.dropdown');
    const categoryIdInput = document.querySelector('input[name="category_id"]');

    dropdowns.forEach(dropdown => {
        const select = dropdown.querySelector('.select');
        const caret = dropdown.querySelector('.caret');
        const menu = dropdown.querySelector('.menu');
        const options = dropdown.querySelectorAll('.menu li');
        const selected = dropdown.querySelector('.selected');

        select.addEventListener('click', () => {
            select.classList.toggle('select-clicked');
            caret.classList.toggle('caret-rotate');
            menu.classList.toggle('menu-open');
        });

        options.forEach(option => {
            option.addEventListener('click', () => {
                const categoryId = option.getAttribute('data-value');
                const categoryName = option.textContent;

                categoryIdInput.value = categoryId;
                selected.textContent = categoryName;
                select.classList.remove('select-clicked');
                caret.classList.remove('caret-rotate');
                menu.classList.remove('menu-open');
            });
        });
    });
});
/*
*  --------------------- End of Dropdown Function to Select ------------------------
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
*  -------------------- Function for Warning Message ---------------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const warningMessage = document.querySelector('.warning-message');

    if (warningMessage) {
        setTimeout(() => {
            warningMessage.style.opacity = '0';
            warningMessage.remove();
        }, 3000);
    }
});
/*
*  -------------------------- End of Function for Warning Message -------------------
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
*  -------------------------- Function for Delete Confirmation Pop Up ---------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const deleteBtn = document.querySelector('.delete-button-popup');
    const confirmationPopup = document.getElementById('deletePopup');
    const closeBtn = document.querySelector('.close-popup');
    const confirmDeleteBtn = document.querySelector('.confirm-delete');
    const deleteForm = document.getElementById('deleteForm');
    const visibility = 'open-popup';

    deleteBtn.addEventListener('click', () => {
        confirmationPopup.classList.add(visibility);
    });

    closeBtn.addEventListener('click', () => {
        confirmationPopup.classList.remove(visibility);
    });

    confirmDeleteBtn.addEventListener('click', () => {
        deleteForm.submit();
    });
});
/*
*  ------------------- End of Function for Delete Confirmation Popup --------------------------
*/




/*
*  -------------------------- Function to Click an Icon for Search ---------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const searchBtn = document.getElementById('search-button');

    searchBtn.addEventListener('click', () => {
        const search = document.getElementById('search-form');
        search.submit();
    });
});
/*
*  ---------------------- End of Function to Click an Icon for Search -----------------------
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