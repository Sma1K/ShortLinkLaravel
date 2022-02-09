
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- Bootstrap Bundle JS (jsDelivr CDN) -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <div class="container">
        <h1>Create short link</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{route('generate.shorten.link.post') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="link" class="form-control" placeholder="URL">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Save link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <div class="aler alert-success">
                    <p>{{Session::get('success')}}</p>
                </div>
            @endif

            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Short link</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shortLinks as $link)
                    <tr>
                        <td>{{ $link->id }}</td>
                        <td>
                            <a href="{{ route('shorten.link', ['code'=>$link->code]) }}" target="_blank">
                               {{ route('shorten.link', ['code'=>$link->code]) }}
                            </a>
                        </td>
                        <td>{{ $link->link }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

