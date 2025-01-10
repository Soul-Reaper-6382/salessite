@if(Auth()->user()->status == 1)
@extends('layouts.dashboard')
@section('title', 'Change Plan - Smugglers')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <section id="account-overview">
                <h1 class="dashboard_title_heading">Change Plan</h1>
                @if(Auth::user()->stripe_id == null)
                @include('trialtext')
                @else
                <div class="account-details mt-3 mb-3">
                    @include('ChangePlanTrail.plan_change_dash_trailing')
                </div>
                @endif
            </section>
</div>
</div>
@include('layouts.footer_dashboard')


<script>

    $(document).ready(function(){
    $('.tab_price').on('click', function() {
                var name = $(this).data('name').toLowerCase(); // Get the data-name value and convert to lowercase

                // Remove active class from all labels and add to the clicked one
                $('.tab_price label').removeClass('active');
                $(this).find('label').addClass('active');

                // Show elements matching the data-name and hide others
                $('.price_main_column').each(function() {
                    if ($(this).data('dur') === name) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });

    $(document).ready(function() {
    
        $('.click_change_plan_upd').on('click', function () {
    var planId = $(this).data('id');
    var planName = $(this).closest('.price_main_column').find('h3').text().trim();

    // Show a confirmation dialog
    var confirmMessage = `Are you sure you want to change your plan to ${planName}?`;
    if (!confirm(confirmMessage)) {
        console.log('Plan change canceled.');
        return;
    }

    // Proceed with the AJAX request
    $.ajax({
        url: '{{ route("change_plan_trailing") }}',
        type: 'POST',
        data: {
            plan_id: planId,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            console.log(response)
            if (response.success) {
                alert(response.message);
                location.reload(); // Reload the page to reflect the changes
            } else {
                alert(response.error || 'Failed to update plan.');
                // location.reload();
            }
        },
        error: function (xhr) {
            console.log(xhr)
            var errorMessage = 'An error occurred.';
            if (xhr.responseJSON && xhr.responseJSON.error) {
                errorMessage = xhr.responseJSON.error;
            } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                errorMessage = xhr.responseJSON.errors.join('\n');
            }
            // alert(errorMessage);
            location.reload();
        }
    });
    });

    });
</script>

@endsection
@endif