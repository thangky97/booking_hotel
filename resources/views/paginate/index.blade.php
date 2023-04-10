<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .pagination-outer {
            text-align: center;
        }

        .pagination {
            display: inline-flex;
            padding: 0 30px;
            position: relative;
        }

        .pagination:before {
            content: "";
            width: 100%;
            height: 10px;
            border-radius: 20px;
            background: linear-gradient(to right, #42246a, #e9403b);
            position: absolute;
            bottom: -20px;
            left: 0;
        }

        .pagination li a.page-link {
            width: 40px;
            height: 40px;
            line-height: 36px;
            border-radius: 50%;
            border: 1px solid #cfd0d2;
            background: #cfd0d2;
            padding: 0;
            margin: 0 12px 0 0;
            font-size: 22px;
            font-weight: 600;
            color: #fff;
            position: relative;
            transition: all 0.3s ease 0s;
        }

        .pagination li:last-child a.page-link {
            margin-right: 0;
        }

        .pagination li a.page-link:hover,
        .pagination li.active a.page-link,
        .pagination li.active a.page-link:hover {
            color: #fff;
            border-color: #e23f3d;
            background: #e23f3d;
        }

        .pagination li a.page-link:before {
            content: "";
            width: 20px;
            height: 20px;
            background: #e9ff12;
            border: 5px solid #df376a;
            border-radius: 10px 0 10px 10px;
            margin: 0 auto;
            opacity: 0;
            position: absolute;
            bottom: -40px;
            left: 0;
            right: 0;
            transform: rotate(-45deg);
            transition: all 0.3s ease 0s;
        }

        .pagination li:first-child a.page-link:before,
        .pagination li:last-child a.page-link:before {
            display: none;
        }

        .pagination li a.page-link:hover:before,
        .pagination li.active a.page-link:before,
        .pagination li.active a.page-link:hover:before {
            opacity: 1;
            bottom: -33px;
        }

        @media only screen and (max-width: 479px) {
            .pagination {
                display: block;
                overflow: auto;
            }

            .pagination:before,
            .pagination li a.page-link:before {
                display: none;
            }

            .pagination li {
                display: inline-block;
            }
        }
    </style>
</head>

<body>
    @if ($paginator->hasPages())
    <nav class="pagination-outer" aria-label="Page navigation">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
            <li class="page-item" class="disabled" aria-disabled="true">
                <a href="#" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>

            @else
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            @endif


            @foreach ($elements as $element)

            @if (is_string($element))
            <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif


            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>


            @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>

            @endif
            @endforeach
            @endif
            @endforeach


            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>

            @else
            <li class="page-item" class="disabled" aria-disabled="true">
                <a href="#" class="page-link" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>

            @endif
        </ul>
    </nav>
    @endif


</body>


</html>