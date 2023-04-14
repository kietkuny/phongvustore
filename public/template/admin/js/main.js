$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

function removeRow(id, url) {
  $.ajax({
    type: "DELETE",
    datatype: "JSON",
    data: { id },
    url: url,
    success: function (result) {
      if (result.error === false) {
        alert(result.message);
        location.reload();
      } else {
        alert('Xoá lỗi vui lòng thử lại');
      }
    },
  });
}

/*Upload File */
$('#upload').change(function () {
  let form = new FormData();
  form.append('file', $(this)[0].files[0]);

  $.ajax({
    processData: false,
    contentType: false,
    type: 'POST',
    datatype: 'JSON',
    data: form,
    url: '/admin/upload/services',
    success: function (results) {
      if (results.error === false) {
        $('#image_show').html('<a href="' + results.url + '" target="_blank">' +
          '<img src="' + results.url + '" width="100px"></a>');

        $('#thumb').val(results.url);
      } else {
        alert('Upload File Lỗi');
      }
    }
    
    // success: function (results) {
    //   if (results.error === false) {
    //     $('#image_show').html('<a href="' + results.url + '" target="_blank">' +
    //       '<img src="' + results.url + '" width="100px"></a>');

    //     $('#thumb').val(results.url);

    //     $('#thumb').siblings('div').remove();
    //     $('#thumb').after('<div><img src="' + results.url + '" width="100" /></div>');

    //   } else {
    //     alert('Upload File Lỗi');
    //   }
    // }
  })
});


// $('#upload').change(function () {
//   let form = new FormData();
//   $.each(this.files, function (i, file) {
//     form.append('files[]', file);
//   });

//   $.ajax({
//     processData: false,
//     contentType: false,
//     type: 'POST',
//     datatype: 'JSON',
//     data: form,
//     url: '/admin/upload/services',
//     success: function (results) {
//       if (results.error === false) {
//         $('#image_preview').empty();
//         $.each(results.urls, function (i, url) {
//           $('#image_preview').append(
//             '<div class="col-md-3">' +
//             '<img src="' + url + '" class="img-thumbnail" width="200">' +
//             '<div class="mt-1">' +
//             '<div><small class="text-muted">' + getFileName(url) + '</small></div>' +
//             '<div><button type="button" class="btn btn-sm btn-danger delete-image">Xóa</button></div>' +
//             '<input type="hidden" name="images[]" value="' + url + '">' +
//             '</div>' +
//             '</div>'
//           );
//         });
//       } else {
//         alert('Upload File Lỗi');
//       }
//     }
//   });
// });

// /* Delete Image */
// $(document).on('click', '.delete-image', function () {
//   $(this).parents('.col-md-3').remove();
// });

// /* Get file name from URL */
// function getFileName(url) {
//   var parts = url.split('/');
//   return parts[parts.length - 1];
// }