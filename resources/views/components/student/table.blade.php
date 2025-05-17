@props([
    'columns',
    'values',
    'edit_route' => null,
    'delete_route' => null,
    'view_route' => null,
    'hidden_field' => null,
    'status_route' => null,
    'action' => null,
])


{{-- {{dd($values)}} --}}
<div class=" mt-3 ">
    @if (empty($values[0]))
        <h4 class="mt-2  text-muted text-center">No data found! </h4>
    @else
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <th>SN</th>
                    {{-- @if ($values[0]->image)
                        <th scope="col">Image</th>
                    @endif --}}
                    @foreach ($values[0]->getAttributes() as $key => $val)
                        @if (!in_array($key, $hidden_field))
                            @if ($key == 'program_id')
                                <th scope="col">Course</th>
                            @else
                                <th scope="col">{{ Str::ucfirst($key) }}</th>
                            @endif
                        @endif
                    @endforeach



                    <th>Actions</th>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach ($values as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- @isset($value->image)
                                <td>
                                    @isset($value->image[0]->image)
                                        <div class="avatar avatar-md">
                                            <img src="{{ asset('storage/' . $value->image[0]->image) }}" class="avatar-img "
                                                alt="" srcset="">
                                        </div>
                                    @endisset
                                </td>
                            @endisset --}}

                            @foreach ($value->getAttributes() as $key => $val)
                                @if (!in_array($key, $hidden_field))
                                    <td>
                                        @if ($key == 'description')
                                            {!! Str::limit(strip_tags($val), '30', '...') !!}
                                        @elseif($key == 'viewed')
                                            @if ($val == 0)
                                                <span class="badge bg-success">New</span>
                                            @endif
                                        @elseif($key == 'portfolio_id')
                                            {{ $value->portfolio->name }}
                                        @elseif($key == 'category_id')
                                            @isset($value->category->name)
                                                {{ $value->category->name }}
                                            @endisset
                                        @elseif ($key == 'program_id')
                                            @isset($value->program->title)
                                                {{ $value->program->title }}
                                            @endisset
                                        @elseif($status_route && $key == 'status')
                                            <form action="{{ route($status_route, $value->id) }}">
                                                @csrf
                                                <select name="status" id="" class="form-select form-select-sm"
                                                    onchange="this.form.submit()">
                                                    <option value="pending"
                                                        @if ($val == 'pending') selected @endif>Pending
                                                    </option>
                                                    <option value="joined"
                                                        @if ($val == 'joined') selected @endif>Joined
                                                    </option>
                                                    <option value="rejected"
                                                        @if ($val == 'rejected') selected @endif>Rejected
                                                    </option>
                                                </select>
                                            </form>
                                        @else
                                            {{ Str::limit($val, '30', '...') }}
                                        @endif

                                    </td>
                                @endif
                            @endforeach


                            {{-- actions --}}
                            <td class="">



                                @if (!is_null($view_route))
                                    <a href="{{ route($view_route, [$value->id]) }}"
                                        class="btn btn-primary btn-small mb-sm-1 "><i class="fa-solid fa-eye"></i></a>
                                @endif
                                @if (!is_null($edit_route))
                                    <a href="{{ route($edit_route, [$value->id]) }}"
                                        class="btn btn-secondary btn-small mb-sm-1 "><i class="fa-solid fa-pen"></i></a>
                                @endif
                                @if (!is_null($delete_route))
                                    <button type="button" class="btn btn-small mb-sm-1 btn-danger"
                                        data-bs-toggle="modal" data-bs-target="#verticalModal{{ $value->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="verticalModal{{ $value->id }}" tabindex="-1"
                                        aria-labelledby="verticalModalTitle{{ $value->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="verticalModalTitle{{ $value->id }}">
                                                        Confirmation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Are you sure you want to delete?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route($delete_route, [$value->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                    </form>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-4 d-flex justify-content-center ">

            {{ $values->links() }}
        </div>

    @endif

</div>
