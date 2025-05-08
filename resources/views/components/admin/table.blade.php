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
                            <th scope="col">{{ Str::ucfirst($key) }}</th>
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
                                        @elseif ($key == 'status')
                                            <a href="{{ route($status_route, ['id' => $value->id]) }}">
                                                @if ($val == true)
                                                    <span class="badge bg-success p-2 text-light"></i>On</span>
                                                @else
                                                    <span class="badge bg-secondary p-2 text-light"></i>Off</span>
                                                @endif
                                            </a>
                                        @elseif ($key == 'program_id')
                                            @isset($value->program->title)
                                                {{ $value->program->title }}
                                            @endisset
                                        @else
                                            {{ Str::limit($val, '30', '...') }}
                                        @endif

                                    </td>
                                @endif
                            @endforeach


                            {{-- actions --}}
                            <td class="">


                                <button type="button" class="btn btn-small mb-sm-1 btn-primary" data-toggle="modal"
                                    data-target="#view{{ $value->id }}"> <i class="fa-solid fa-eye"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade bd-example-modal-xl" id="view{{ $value->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="verticalModalTitle">View</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <x-admin.table-view :values="$value" />
                                            </div>

                                        </div>
                                    </div>
                                </div>



                                @if (!is_null($edit_route))
                                    <a href="{{ route($edit_route, [$value->id]) }}"
                                        class="btn btn-secondary btn-small mb-sm-1 "><i class="fa-solid fa-pen"></i></a>
                                @endif
                                @if (!is_null($delete_route))
                                    <button type="button" class="btn btn-small mb-sm-1 btn-danger" data-toggle="modal"
                                        data-target="#verticalModal{{ $value->id }}"> <i
                                            class="fa-solid fa-trash"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="verticalModal{{ $value->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="verticalModalTitle">Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Are you sure you want to delete?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route($delete_route, [$value->id]) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        <input type="submit" value="Delete"
                                                            class="btn btn-danger d-inline">
                                                    </form>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>

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
