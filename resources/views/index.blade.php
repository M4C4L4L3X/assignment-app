<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            margin-left: 0;
        }

        .navbar-nav {
            flex-direction: row;
        }

        .navbar-nav .nav-item {
            margin: 0 10px;
        }

        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            height: auto;
            border-right: 1px solid #ddd;
        }

        .sidebar h5 {
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .property-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 1.5rem;
        }

        .property-card {
            flex: 1 1 calc(33% - 30px);
            max-width: 32%;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .property-card:hover {
            cursor: pointer;
        }

        .property-card img {
            width: 100%;
            height: auto;
        }

        .property-details {
            padding: 10px;
        }

        .map-section {
            height: 500px;
            max-width: 350px;
            margin-top: 20px;
        }

        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .sort-by-dropdown {
            position: relative;
        }

        .sort-by-dropdown button {
            border: 1px solid #ddd;
            border-radius: 25px;
            padding: 10px 15px;
            background-color: white;
            display: flex;
            align-items: center;
        }

        .sort-by-dropdown .dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            z-index: 1000;
        }

        @media (max-width: 768px) {
            .property-card {
                flex: 1 1 100%;
                max-width: 100%;
            }

            .sidebar {
                height: auto;
                margin-bottom: 1.5rem;
            }

            .map-section {
                height: 300px;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">RealEstate</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sell</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rent</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn btn-primary ms-auto">Add Property</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h5>Filters</h5>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Property Type</label><br>
                        <input type="checkbox" name="type" value="House"> House<br>
                        <input type="checkbox" name="type" value="Apartment"> Apartment<br>
                        <input type="checkbox" name="type" value="Room"> Room<br>
                        <input type="checkbox" name="type" value="Townhall"> Townhall<br>
                        <input type="checkbox" name="type" value="Parking"> Parking<br>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price Range</label>
                        <div class="d-flex align-items-center">
                            <input type="number" class="form-control" placeholder="Min" style="max-width: 150px;">
                            <span class="mx-2">-</span>
                            <input type="number" class="form-control" placeholder="Max" style="max-width: 150px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bedrooms</label>
                        <select class="form-select">
                            <option value="">Any</option>
                            <option value="1">1 Bedroom</option>
                            <option value="2">2 Bedrooms</option>
                            <option value="3">3 Bedrooms</option>
                            <option value="4">4+ Bedrooms</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bathrooms</label>
                        <select class="form-select">
                            <option value="">Any</option>
                            <option value="1">1 Bathroom</option>
                            <option value="2">2 Bathrooms</option>
                            <option value="3">3 Bathrooms</option>
                            <option value="4">4+ Bathrooms</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                </form>
            </div>

            <div class="col-md-7">
                <div class="results-header">
                    <div>
                        <span>Showing <strong>{{ $properties->count() }}</strong> search results</span>
                    </div>

                    <div class="sort-by-dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort by: Newest
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="sortDropdown">
                            <li><a class="dropdown-item" href="#">Newest</a></li>
                            <li><a class="dropdown-item" href="#">Oldest</a></li>
                            <li><a class="dropdown-item" href="#">Price (High to Low)</a></li>
                            <li><a class="dropdown-item" href="#">Price (Low to High)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="property-list">
                    @foreach($properties as $property)
                    <div class="property-card">
                        <img src="{{ $property->image_url }}" alt="{{ $property->address }} Image">
                        <div class="property-details">
                            <h4>${{ number_format($property->price) }}</h4>
                            <p>{{ $property->address }}</p>
                            <p>{{ $property->bedrooms }} Beds, {{ $property->bathrooms }} Baths, {{ $property->size }} Sqft</p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="col-md-3">
                <img class="map-section" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fallinallnews.com%2Fwp-content%2Fuploads%2F2015%2F05%2FGoogle-Maps-1024x574.png&f=1&nofb=1&ipt=fb1d5feaac67e7f14c124b1eeda87a9a05609ffb2801ae6781f9d48744e6c85b&ipo=images" alt="Map">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownToggle = document.getElementById('sortDropdown');
            var dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown-item');

            dropdownItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    var selectedText = this.textContent;
                    dropdownToggle.textContent = 'Sort by: ' + selectedText;
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>