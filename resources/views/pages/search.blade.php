@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Search results" />

    <!--<< Program Details Section Start >>-->
    <div class="it-course-area p-relative grey-bg pt-120 pb-120">
        <div class="container">
            <div class="row">
                @if (count($results) > 0)
                    <!-- Extract unique table names -->
                    @php
                        $groupedResults = collect($results)->groupBy('table_name');
                    @endphp

                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs" id="searchTabs" role="tablist">
                        @php
                            // Define custom labels for table names
                            $tableLabels = [
                                'blogs' => 'Blogs',
                                'teams' => 'Team',
                                'programs' => 'Courses',
                                'events' => 'Events',
                                'publications' => 'Publications',
                            ];
                        @endphp

                        @foreach ($groupedResults as $table => $items)
                            <li class="nav-item" style="font-size: 16px; font-weight:600;" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $table }}-tab"
                                    data-bs-toggle="tab" data-bs-target="#{{ $table }}" type="button"
                                    role="tab">
                                    {{ $tableLabels[$table] ?? ucfirst($table) }} ({{ count($items) }})
                                </button>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content mt-3" id="searchTabsContent">
                        @foreach ($groupedResults as $table => $items)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $table }}"
                                role="tabpanel">
                                <div class="row">

                                    @foreach ($items as $item)
                                        @if ($item->table_name == 'blogs')
                                            <x-cards.blog-card :blog="$item" />
                                        @endif
                                        @if ($item->table_name == 'teams')
                                            <x-cards.teacher-card :teacher="$item" />
                                        @endif
                                        @if ($item->table_name == 'programs')
                                            <x-cards.course-card :program="$item" />
                                        @endif
                                        @if ($item->table_name == 'events')
                                            <x-cards.event-card :event="$item" />
                                        @endif
                                        @if ($item->table_name == 'publications')
                                            <x-cards.publication-card :publication="$item" />
                                        @endif
                                    @endforeach
                                    {{-- @foreach ($items as $item)
                                        <li class="list-group-item">
                                            <h5>{{ $item->title ?? $item->name }}</h5>
                                            <p>{!! Str::limit($item->description ?? '', 150) !!}</p>
                                            <small>Created at: {{ $item->created_at }}</small>
                                        </li>
                                    @endforeach --}}
                                </div>

                            </div>
                        @endforeach
                    </div>
                @else
                    <div style="min-height: 50vh;">

                        <p style="font-size: 22px; font-weight:700;" class="text-center">No results found.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
