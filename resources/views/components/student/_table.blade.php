{{-- resources/views/components/student/_table.blade.php --}}
<x-student.table :values="$students" edit_route="student.edit" delete_route="student.destroy" view_route="student.show"
    status_route="student.status" :hidden_field="['id', 'email', 'slug', 'created_at', 'extra', 'updated_at']" />
