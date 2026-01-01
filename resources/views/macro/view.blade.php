@extends('layouts.main')
@section('content')
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
             <input
                class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark" 
                type="button" value="Copiar macro" onclick="navigator.clipboard.writeText( document.getElementById('codigo-vba').innerHTML );">
           
             <div class="flex items-center justify-between p-4 m-4 bg-white rounded-md dark:bg-darker">           
                <pre id="codigo-vba">
                Sub FSOCrear_y_Escribir_en_Archivo_de_texto()
                    Dim FSO As New FileSystemObject
                    Set FSO = CreateObject("Scripting.FileSystemObject")
                    Set FileToCreate = FSO.CreateTextFile("C:\Carpeta VBA\TestFile.txt")
                
                    FileToCreate.Write "Línea de Prueba"
                    FileToCreate.Close
                
                End Sub
            </pre>              

            </div>

            <p class="py-4">
                Aqui deberia de ir una descripcion sobre la macro
            </p>
        </div>
    </div>
    @endsection


