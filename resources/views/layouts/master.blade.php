<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <title>Salary Accounting</title>


</head>

<body>
    <style>
        ion-icon {
            font-size: 24px;
        }

        .eg-card {
            box-sizing: border-box;
            width: calc((100% - 120px) / 4);
            background: #223771;
            border-radius: .4rem;
        }

        .eg-card:hover {
            background: #f88e4d;
        }

        .eg-link {
            display: block;
            width: 100%;
            text-decoration: none;
            align-content: center;
            text-align: center;
            color: #f1f1f1;
            padding: 3rem 2.5rem;
        }

        .eg-link:hover {
            color: #f1f1f1;
        }
    </style>
    @yield('body')
</body>


@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: true
        });
    </script>
@endif
@if ($errors->any())
    <script>
        let errMsg = @json($errors->all()).join('<br>');
        Swal.fire({
            icon: 'error',
            title: 'Đã xảy ra lỗi',
            html: errMsg,
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif

<script>
    document.querySelectorAll(".price-display").forEach((el) => {
        const number = Number(el.textContent);
        el.textContent = number.toLocaleString("vi-VN");
    });
</script>

</html>