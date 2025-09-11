<script src="{{asset('/')}}admin/assets/js/plugins/apexcharts.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/pages/dashboard-ecommerce.js"></script><!-- [Page Specific JS] end -->
<!-- Required Js -->
<script src="{{asset('/')}}admin/assets/js/plugins/popper.min.js"></script> 
<script src="{{asset('/')}}admin/assets/js/plugins/simplebar.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/bootstrap.min.js"></script>

<script src="{{asset('/')}}admin/assets/js/fonts/custom-font.js"></script>
<script src="{{asset('/')}}admin/assets/js/pcoded.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/feather.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="{{asset('/')}}admin/assets/js/plugins/sweetalert2.all.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"> </script>

<!-- datatable Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/buttons.colVis.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/buttons.print.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/pdfmake.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/jszip.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/vfs_fonts.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/buttons.html5.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/buttons.bootstrap5.min.js"></script>
<!--Internal Fileuploads js-->
<script src="{{asset('/')}}admin/assets/fileuploads/js/fileupload.js"></script>
<script src="{{asset('/')}}admin/assets/fileuploads/js/file-upload.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/bootstrap-switch-button.min.js"></script>
<!-- Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
{{-- <script src="{{asset('/')}}admin/assets/js/plugins/summernote/0.8.20/summernote-bs4.min.js"></script> --}}
<!-- Bootstrap Tags Input JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script>
  $(document).ready(function() {
      $('#summernote').summernote({
          height: 100,
      });
  });
</script>
 <!-- Script -->
 
 <script>
   // [ Column Selectors ]
   $('#cbtn-selectors').DataTable({
     dom: 'Bfrtip',
     buttons: [{
         extend: 'copyHtml5',
         exportOptions: {
           columns: [0, ':visible']
         }
       },
       {
         extend: 'excelHtml5',
         exportOptions: {
           columns: ':visible'
         }
       },
       {
         extend: 'csv',
         exportOptions: {
           columns: ':visible'
         }
       },
       {
         extend: 'print',
         exportOptions: {
           columns: ':visible'
         }
       },
       {
         extend: 'pdfHtml5',
         exportOptions: {
           columns: [0, 1, 2, 5]
         }
       },
       'colvis'
     ]
   });
   //tags inputs
   $(document).ready(function() {
        $('input[data-role="tagsinput"]').tagsinput();
    });

</script>
<script>
  (function () {
    var switch_event = document.querySelector('#switch_event');
    switch_event.addEventListener('change', function () {
      if (switch_event.checked) {
        document.querySelector('#console_event').innerHTML = 'Switch Button Checked';
      } else {
        document.querySelector('#console_event').innerHTML = 'Switch Button Unchecked';
      }
    });
  })();
</script>
{{-- for add More image --}}
<script>
  $(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
      i++;
      $('#dynamicTable').append(
        '<tr id="row' + i + '"><td><input type="file" accept="image/*" name="images[]" class="form-control name_list"></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id).remove();
    });
  });
</script>
<!-- [Page Specific JS] end -->
<script>
  $(document).ready(function() {
    
      $('#logout').on('click', function(event){
          event.preventDefault();
          // const deleteUrl = $(this).attr('href');
          swal.fire({
              title: "Are you sure you want to logout?",
              text: "You won't be logged in anymore.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Logout',
              cancelButtonText: 'Cancel'
          })
          .then((result) => {
              if (result.isConfirmed) {
                  window.location.href = "{{ route('admin.logout') }}";
              } else {
                  swal.fire({
                      title: "Ok?",
                      text: "You are not Logout",
                      icon: "info",
                  }); 
              }
          });
      });
  });
</script>
{{-- Delete the Data --}}
<script>
 
  $(document).on('click', '.delete', function() {
        var childcategoryId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "Once deleted, you won't be able to recover this data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the delete form
                $('#delete-form-' + childcategoryId).submit();
            } else {
                Swal.fire('Cancelled', 'Your data is safe :)', 'info');
            }
        });
    });
</script>
<script>
  
</script>
<script>
    layout_change('light');
</script>
<script>
    layout_sidebar_change('dark');
</script>
<script>
    layout_header_change('dark');
</script>
<script>
    change_box_container('false');
</script>
<script>
    layout_caption_change('true');
</script>
<script>
    layout_rtl_change('false');
</script>
<script>
    preset_change("preset-1");
</script>

             {{-- Course Filtering Script --}}
                     <script>
                     document.getElementById('select-course').addEventListener('change', function() {
                        let selectedCourse = this.value.trim().toLowerCase();
                        let rows = document.querySelectorAll('#assignment-table tbody tr');

                        rows.forEach(row => {
                           let course = row.getAttribute('data-course').trim().toLowerCase();

                           if (selectedCourse === 'all' || course === selectedCourse) {
                              row.style.display = ''; // show
                           } else {
                              row.style.display = 'none'; // hide
                           }
                        });
                     });
                  </script>

                        {{-- Short by filter script --}}
                     <script>
                     window.onload = function() {
                        const select = document.getElementById('product-select');
                        const tableBody = document.querySelector('#assignment-table tbody');
                        const table = document.getElementById('assignment-table');
                        const emptyMsg = document.getElementById('empty-message');

                        // Save original HTML
                        const originalRowsHTML = tableBody.innerHTML;

                        select.addEventListener('change', function() {
                           const value = this.value;

                           if(value === 'default') {
                                 // Restore original HTML
                                 tableBody.innerHTML = originalRowsHTML;
                                 table.style.display = "table";
                                 emptyMsg.style.display = "none";
                                 return;
                           }

                           // Get rows as array
                           let rows = Array.from(tableBody.querySelectorAll('.assignment-row'));

                           // Sort rows by timestamp
                           rows.sort((a,b) => {
                                 let aTime = parseInt(a.dataset.timestamp);
                                 let bTime = parseInt(b.dataset.timestamp);
                                 return value === 'latest' ? bTime - aTime : aTime - bTime;
                           });

                           // Clear table and append sorted rows
                           tableBody.innerHTML = '';
                           if(rows.length === 0){
                                 table.style.display = "none";
                                 emptyMsg.style.display = "block";
                           } else {
                                 rows.forEach(row => tableBody.appendChild(row));
                                 table.style.display = "table";
                                 emptyMsg.style.display = "none";
                           }
                        });
                     };
                     </script>

                        {{--Assignment Deadline Countdown script --}}
                     <script>
                        document.addEventListener("DOMContentLoaded", function () {
                           function startCountdown(element, deadline, button) {
                              let countDownDate = new Date(deadline).getTime();

                              let timer = setInterval(function () {
                                 let now = new Date().getTime();
                                 let distance = countDownDate - now;

                                 if (distance <= 0) {
                                    clearInterval(timer);
                                    element.textContent = "Deadline Over";
                                    element.classList.remove("text-success");
                                    element.classList.add("text-danger");

                                    // disable button instead of hiding
                                    button.disabled = true;
                                    button.textContent = "Deadline Over";
                                    button.removeAttribute("data-bs-toggle"); 
                                    button.removeAttribute("data-bs-target"); 
                                 } else {
                                    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                    element.textContent = 
                                       (days > 0 ? days + "d " : "") + 
                                       hours + "h " + 
                                       minutes + "m " + 
                                       seconds + "s ";
                                 }
                              }, 1000);
                           }

                           // initialize all timers
                           document.querySelectorAll(".deadline-timer").forEach(function (el) {
                              let deadline = el.getAttribute("data-deadline");
                              let id = el.id.split("-")[1]; // get assignment id
                              let button = document.getElementById("submit-" + id);

                              startCountdown(el, deadline, button);
                           });
                        });
                   </script>


      {{-- Modal data fetch script --}}

<script>
document.addEventListener("DOMContentLoaded", function () {
    var uploadModal = document.getElementById('uploadModal');
    uploadModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Clicked button

        // Student Name
        var studentName = button.getAttribute('data-student'); 
        var studentInput = uploadModal.querySelector('#studentName');
        if (studentInput) {
            studentInput.value = studentName;
        }

        // Experiment Name
        var expName = button.getAttribute('data-expname'); 
        var expInput = uploadModal.querySelector('#experimentName');
        if (expInput) {
            expInput.value = expName;
        }

        // Current Date & Time
        var now = new Date();
        var options = { year: 'numeric', month: 'short', day: 'numeric' };
        var dateStr = now.toLocaleDateString('en-US', options);
        var timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        
        var dateTimeInput = uploadModal.querySelector('#dateTime');
        if (dateTimeInput) {
            dateTimeInput.value = dateStr + " - " + timeStr;
        }
    });
});
</script>

