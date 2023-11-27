<x-theme title="Teacher">
<table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อสกุล</th>
                        <th>อีเมล์</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $teachers = json_decode(file_get_contents('https://raw.githubusercontent.com/arc6828/laravel8/main/public/json/teachers.json'));
                    @endphp
                    @foreach ($teachers as $row)
                        <tr>
                            <td><img class="rounded" src="{{ $row->image }}" height="30" /></td>
                            <td>{{ $row->role }} {{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </x-theme>