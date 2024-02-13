const swal = $(".swal").data("swal");
if (swal) {
	Swal.fire({
		title: "Success",
		text: swal,
		icon: "success",
	});
}
const swalerror = $(".swal-error").data("swalerror");
if (swalerror) {
	Swal.fire({
		title: "error",
		text: swalerror,
		icon: "error",
	});
}

$(document).on("click", ".btn-hapus", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Apakah Kamu Yakin?",
		text: "Data Akan Terhapus Permanent",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus!",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});


// $(document).on("click", ".btn-email", function (e) {
// 	e.preventDefault();
// 	const href = $(this).attr("href");

// 	Swal.fire({
// 		title: 'Apakah Kamu akan Mengirim invoice?',
// 		text: "Pastikan semua nya sudah benar",
// 		icon: 'question',
// 		showCancelButton: true,
// 		confirmButtonColor: '#3085d6',
// 		cancelButtonColor: '#d33',
// 		confirmButtonText: 'Ya, Kirim!'
// 	  }).then((result) => {
// 		if (result.isConfirmed) {
// 			document.location.href = href;
// 		}
// 	  })
// 	})



//Count Button
const counts = document.querySelector(".btn-count");
var count = 0;
var output = document.getElementById("output");
function countclik() {
	count = count + 1;
	output.innerHTML = count;
}
//End

// Modal Eventlistener Menu
const btnOpenModal = document.getElementById("btnadd");

btnOpenModal.addEventListener("click", function () {
	$("#staticBackdrop").modal("show");
});

document.addEventListener("DOMContentLoaded", function () {
	var btnEdit = document.querySelectorAll(".btn-edit");
	btnEdit.forEach(function (btn) {
		btn.addEventListener("click", function () {
			var id = this.getAttribute("data-id");
			var menuName = this.getAttribute("data-menu");
			var Url = this.getAttribute("data-url");
			var Icon = this.getAttribute("data-icon");
			var kategori = this.getAttribute("data-kategori");
			var active = this.getAttribute("data-active");

			document.getElementById("editId").value = id;
			document.getElementById("editMenuName").value = menuName;
			document.getElementById("Editurl").value = Url;
			document.getElementById("Editkategori").value = kategori;
			document.getElementById("EditIcon").value = Icon;
			document.getElementById("EditActive").checked = active === 1;

			var editModal = document.getElementById("editMenuModal");
			var bsModal = new bootstrap.Modal(editModal);
			bsModal.show();
		});
	});
});

// //Modal EventListener SubMenu
document.addEventListener("DOMContentLoaded", function () {
	var btnEdit = document.querySelectorAll(".btn-subedit");
	btnEdit.forEach(function (btn) {
		btn.addEventListener("click", function () {
			var id = this.getAttribute("data-id");
			var Title = this.getAttribute("data-title");
			var menu_id = this.getAttribute("data-menu_id");
			var url = this.getAttribute("data-url");
			var icon = this.getAttribute("data-icon");
			var active = this.getAttribute("data-active");

			document.getElementById("editId").value = id;
			document.getElementById("editTitle").value = Title;
			document.getElementById("editMenu_id").value = menu_id;
			document.getElementById("editUrl").value = url;
			document.getElementById("editIcon").value = icon;
			document.getElementById("editIs_active").checked = active === 1;

			var editModal = document.getElementById("editSubmenuModal");
			var bsModal = new bootstrap.Modal(editModal);
			bsModal.show();
		});
	});
});
//End

$(function () {
	//Initialize Select2 Elements
	$(".select2").select2();

	//Initialize Select2 Elements
	$(".select2bs4").select2({
		theme: "bootstrap4",
	});
});

document.addEventListener("DOMContentLoaded", function () {
	var btnEdit = document.querySelectorAll(".btn-supportedit");
	btnEdit.forEach(function (btn) {
		btn.addEventListener("click", function () {
			var id = this.getAttribute("data-id");
			var Image = this.getAttribute("data-image");
			var active = this.getAttribute("data-active");

			document.getElementById("editid").value = id;
			document.getElementById("editimage").value = Image;
			document.getElementById("toggleActiveSwitch").checked = active === 1;

			var editModal = document.getElementById("editModalSupport");
			var bsModal = new bootstrap.Modal(editModal);
			bsModal.show();
		});
	});
});

document.addEventListener("DOMContentLoaded", function () {
	var btnEdit = document.querySelectorAll(".btn-banneredit");
	btnEdit.forEach(function (btn) {
		btn.addEventListener("click", function () {
			var id = this.getAttribute("data-id");
			var title = this.getAttribute("data-title");
			var active = this.getAttribute("data-active");

			document.getElementById("editId").value = id;
			document.getElementById("editTitle").value = title;
			document.getElementById("Active").checked = active === 1;

			var editModal = document.getElementById("ModalEditBanner");
			var bsModal = new bootstrap.Modal(editModal);
			bsModal.show();
		});
	});
});
document.addEventListener("DOMContentLoaded", function () {
	var btnEdit = document.querySelectorAll(".btn-navbaredit");
	btnEdit.forEach(function (btn) {
		btn.addEventListener("click", function () {
			var id = this.getAttribute("data-id");
			var Title = this.getAttribute("data-name");
			var url = this.getAttribute("data-url");
			var active = this.getAttribute("data-active");

			document.getElementById("editId").value = id;
			document.getElementById("editName").value = Title;
			document.getElementById("Editurl").value = url;
			document.getElementById("Active").checked = active === 1;

			var editModal = document.getElementById("ModalNavEdit");
			var bsModal = new bootstrap.Modal(editModal);
			bsModal.show();
		});
	});
});
document.addEventListener("DOMContentLoaded", function () {
	var btnEdit = document.querySelectorAll(".btn-navsubedit");
	btnEdit.forEach(function (btn) {
		btn.addEventListener("click", function () {
			var id = this.getAttribute("data-id");
			var Title = this.getAttribute("data-name");
			var idnav = this.getAttribute("data-id_nav");
			var url = this.getAttribute("data-url");
			var active = this.getAttribute("data-active");

			document.getElementById("editId").value = id;
			document.getElementById("editName").value = Title;
			document.getElementById("editnameNav").value = idnav;
			document.getElementById("editUrl").value = url;
			document.getElementById("editIs_active").checked = active === 1;

			var editModal = document.getElementById("ModalNavSubEdit");
			var bsModal = new bootstrap.Modal(editModal);
			bsModal.show();
		});
	});
});
document.addEventListener("DOMContentLoaded", function () {
	var btnEdit = document.querySelectorAll(".btn-leveledit");
	btnEdit.forEach(function (btn) {
		btn.addEventListener("click", function () {
			var id = this.getAttribute("data-id");
			var role = this.getAttribute("data-role");

			document.getElementById("EditId").value = id;
			document.getElementById("EditRole").value = role;

			var editModal = document.getElementById("EditLevelModal");
			var bsModal = new bootstrap.Modal(editModal);
			bsModal.show();
		});
	});
});
document.addEventListener("DOMContentLoaded", function () {
	var btnEdit = document.querySelectorAll(".btn-repoedit");
	btnEdit.forEach(function (btn) {
		btn.addEventListener("click", function () {
			var id = this.getAttribute("data-id");
			var title = this.getAttribute("data-title");
			var active = this.getAttribute("data-active");

			document.getElementById("editId").value = id;
			document.getElementById("editTitle").value = title;
			document.getElementById("ediis_active").checked = active === 1;

			var editModal = document.getElementById("ModalEditRepo");
			var bsModal = new bootstrap.Modal(editModal);
			bsModal.show();
		});
	});
});
document.addEventListener("DOMContentLoaded", function () {
	var btnEdit = document.querySelectorAll(".btn-editprodi");
	btnEdit.forEach(function (btn) {
		btn.addEventListener("click", function () {
			var id = this.getAttribute("data-id");
			var name = this.getAttribute("data-name");
			var kode = this.getAttribute("data-kode");

			document.getElementById("editid").value = id;
			document.getElementById("editname").value = name;
			document.getElementById("editkode").value = kode;

			var editModal = document.getElementById("ModalEditProdi");
			var bsModal = new bootstrap.Modal(editModal);
			bsModal.show();
		});
	});
});
