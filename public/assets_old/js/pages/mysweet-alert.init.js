function executeExample(t) {
    switch (t) {
        case "basicMessage":
            return void Swal.fire("Any fool can use a computer");
        case "titleText":
            return void Swal.fire("The Internet?", "That thing is still around?", "question");
        case "errorType":
            return void Swal.fire({ icon: "error", title: "Oops...", text: "Something went wrong!", footer: "<a href>Why do I have this issue?</a>" });
        case "customHtml":
            return void Swal.fire({
                title: "<strong>HTML <u>example</u></strong>",
                icon: "info",
                html: 'You can use <b>bold text</b>, <a href="//sweetalert2.github.io">links</a> and other HTML tags',
                showCloseButton: !0,
                showCancelButton: !0,
                focusConfirm: !1,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                confirmButtonAriaLabel: "Thumbs up, great!",
                cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                cancelButtonAriaLabel: "Thumbs down",
            });
        case "clubstatus":
            return void Swal.fire({ title: "Are you sure you want to change the status of this Club?", showCancelButton: !0, confirmButtonText: "Confirm",}).then((e) => {
                e.isConfirmed ? Swal.fire("Activated!", "", "success") : e.isDenied && Swal.fire("Changes are not saved", "", "info");
            });
        case "customPosition":
            return void Swal.fire({ position: "top-end", icon: "success", title: "Your work has been saved", showConfirmButton: !1, timer: 1500 });
        case "customAnimation":
            return void Swal.fire({ title: "Custom animation with Animate.css", showClass: { popup: "animate__animated animate__fadeInDown" }, hideClass: { popup: "animate__animated animate__fadeOutUp" } });
        case "warningConfirm":
            return void Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#085e96",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then(function (e) {
                e.isConfirmed && Swal.fire("Deleted!", "Your file has been deleted.", "success");
            });
        case "teamdelete":
            return void Swal.fire({
                title: "Are you sure you want to delete this club?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#085e96",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then(function (e) {
                e.isConfirmed && Swal.fire("Deleted!", "Your file has been deleted.", "success");
            });
        case "handleDismiss":
            const i = Swal.mixin({ customClass: { confirmButton: "btn btn-success", cancelButton: "btn btn-danger me-2" }, buttonsStyling: !1 });
            return void i
                .fire({ title: "Are you sure?", text: "You won't be able to revert this!", icon: "warning", showCancelButton: !0, confirmButtonText: "Yes, delete it!", cancelButtonText: "No, cancel!", reverseButtons: !0 })
                .then((e) => {
                    e.isConfirmed ? i.fire("Deleted!", "Your file has been deleted.", "success") : e.dismiss === Swal.DismissReason.cancel && i.fire("Cancelled", "Your imaginary file is safe :)", "error");
                });
        case "customImage":
            return void Swal.fire({ title: "Rizz!", text: "Modal with a Brand Logo.", imageUrl: "assets/images/logo-sm.png", imageWidth: 80, imageHeight: 80, imageAlt: "Custom image" });
        case "customWidth":
            return void Swal.fire({ title: "Custom width, padding, background.", width: 600, padding: 50, background: "rgba(254,254,254,0.01)  url(assets/images/bg-body.jpg) ", backgroundSize: "cover", backgroundPosition: "center" });
        case "timer":
            let e;
            return void Swal.fire({
                title: "Auto close alert!",
                html: "I will close in <b></b> milliseconds.",
                timer: 2e3,
                timerProgressBar: !0,
                didOpen: () => {
                    Swal.showLoading(),
                        (e = setInterval(() => {
                            var e = Swal.getContent();
                            e && (e = e.querySelector("b")) && (e.textContent = Swal.getTimerLeft());
                        }, 100));
                },
                willClose: () => {
                    clearInterval(e);
                },
            }).then((e) => {
                e.dismiss === Swal.DismissReason.timer && console.log("I was closed by the timer");
            });
        case "rtl":
            return void Swal.fire({ title: "هل تريد الاستمرار؟", icon: "question", iconHtml: "؟", confirmButtonText: "نعم", cancelButtonText: "لا", showCancelButton: !0, showCloseButton: !0 });
        case "ajaxRequest":
            return void Swal.fire({
                title: "Submit your Github username",
                input: "text",
                inputAttributes: { autocapitalize: "off" },
                showCancelButton: !0,
                confirmButtonText: "Look up",
                showLoaderOnConfirm: !0,
                preConfirm: (e) =>
                    fetch("//api.github.com/users/" + e)
                        .then((e) => {
                            if (e.ok) return e.json();
                            throw new Error(e.statusText);
                        })
                        .catch((e) => {
                            Swal.showValidationMessage("Request failed: " + e);
                        }),
                allowOutsideClick: () => !Swal.isLoading(),
            }).then((e) => {
                e.isConfirmed && Swal.fire({ title: e.value.login + "'s avatar", imageUrl: e.value.avatar_url });
            });
        case "chainingModals":
            return void Swal.mixin({ input: "text", confirmButtonText: "Next &rarr;", showCancelButton: !0, progressSteps: ["1", "2", "3"] })
                .queue([{ title: "Question 1", text: "Chaining swal2 modals is easy" }, "Question 2", "Question 3"])
                .then((e) => {
                    e.value &&
                        ((e = JSON.stringify(e.value)),
                        Swal.fire({
                            title: "All done!",
                            html: `
                  Your answers:
                  <pre><code>${e}</code></pre>
                `,
                            confirmButtonText: "Lovely!",
                        }));
                });
        case "dynamicQueue":
            return void Swal.queue([
                {
                    title: "Your public IP",
                    confirmButtonText: "Show my public IP",
                    text: "Your public IP will be received via AJAX request",
                    showLoaderOnConfirm: !0,
                    preConfirm: () =>
                        fetch("//api.ipify.org?format=json")
                            .then((e) => e.json())
                            .then((e) => Swal.insertQueueStep(e.ip))
                            .catch(() => {
                                Swal.insertQueueStep({ icon: "error", title: "Unable to get your public IP" });
                            }),
                },
            ]);
        case "clubupdate":
            return void Swal.mixin({
                toast: !0,
                position: "top-end",
                showConfirmButton: !1,
                timer: 3e3,
                timerProgressBar: !0,
                didOpen: (e) => {
                    e.addEventListener("mouseenter", Swal.stopTimer), e.addEventListener("mouseleave", Swal.resumeTimer);
                },
            }).fire({ icon: "success", title: "Club details updated successfully!" });
        case "update":
            return void Swal.mixin({
                toast: !0,
                position: "top-end",
                showConfirmButton: !1,
                timer: 3e3,
                timerProgressBar: !0,
                didOpen: (e) => {
                    e.addEventListener("mouseenter", Swal.stopTimer), e.addEventListener("mouseleave", Swal.resumeTimer);
                },
            }).fire({ icon: "success", title: "Updated successfully" });
        case "declarativeTemplate":
            return void Swal.fire({ template: "#my-template" });
        case "TriggerModalToast":
            return Swal.bindClickHandler(), void Swal.mixin({ toast: !0 }).bindClickHandler("data-swal-toast-template");
        case "success":
            return void Swal.fire({ icon: "success", title: "Your work has been saved", timer: 1500 });
        case "error":
            return void Swal.fire({ icon: "error", title: "Oops...", text: "Something went wrong!" });
        case "warning":
            return void Swal.fire({ icon: "warning", title: "Oops...", text: "Icon warning!" });
        case "info":
            return void Swal.fire({ icon: "info", title: "Oops...", text: "Icon Info!" });
        case "question":
            return void Swal.fire({ icon: "question", title: "Oops...", text: "Icon question!" });
    }
}
