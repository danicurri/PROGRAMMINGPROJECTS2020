/*
 * 361 - 19 Feb C - List + menú
Crea un programa que permita al usuario hacer las siguiente manipulaciones sobre una lista de strings:

A para añadir una nueva cadena al final de la lista

B para buscar una cadena

V Para visualizar todos los datos

I para insertar una nueva cadena (en una posición que elija el usuario, contando desde uno)

E para eliminar una cierta cadena (ídem)

M para modificar la cadena que hay en una cierta posición

O para ordenar los datos

Al salir se guardarán los datos en un fichero llamado "360.txt" y al empezar se
leerán desde dicho fichero.

S para salir
*/

using System;
using System.Collections.Generic;
using System.IO;

class Ejercicio
{
    public static void Main()
    {
        string fichero = "360.txt";
        //al entrar cargamos el fichero en la lista
        List<string> lista = new List<string>(File.ReadAllLines(fichero));
        string opcion, cadena;
        bool encontrado = false;
        int pos;

        do
        {
            Console.WriteLine("Elige opción.");
            Console.WriteLine("A.Añadir.");
            Console.WriteLine("B.Buscar.");
            Console.WriteLine("V.Visualizar.");
            Console.WriteLine("I.Insertar.");
            Console.WriteLine("E.Eliminar.");
            Console.WriteLine("M.Modificar.");
            Console.WriteLine("O.Ordenar.");
            Console.WriteLine("S.Salir.");
            opcion = Console.ReadLine().ToUpper();

            switch (opcion)
            {
                case "A":
                    Console.Write("Cadena a añadir: ");
                    cadena = Console.ReadLine();
                    lista.Add(cadena);
                    Console.WriteLine();
                    break;

                case "B":
                    Console.Write("Cadena a buscar: ");
                    cadena = Console.ReadLine();
                    for (int i = 0; i < lista.Count; i++)
                    {
                        if (lista.Contains(cadena))
                        {
                            encontrado = true;
                        }
                    }
                    if (!encontrado)
                    {
                        Console.WriteLine("Cadena no existe.");
                    }
                    else
                    {
                        Console.WriteLine(cadena);
                    }

                    Console.WriteLine();
                    break;

                case "V":
                    for (int i = 0; i < lista.Count; i++)
                    {
                        Console.WriteLine(lista[i]);
                    }
                    Console.WriteLine();
                    break;

                case "I":
                    Console.Write("Cadena a insertar: ");
                    cadena = Console.ReadLine();
                    Console.Write("Posición: ");
                    pos = Convert.ToInt32( Console.ReadLine() ) - 1;
                    lista.Insert(pos, cadena);
                    Console.WriteLine();
                    break;

                case "E":
                    Console.Write("Cadena a eliminar: ");
                    cadena = Console.ReadLine();
                    lista.Remove(cadena);
                    Console.WriteLine();
                    break;

                case "M":
                    Console.Write("Cadena a modificar: ");
                    cadena = Console.ReadLine();
                    Console.Write("Nueva cadena: ");
                    string nuevaCadena = Console.ReadLine();
                    pos = lista.IndexOf(cadena);
                    lista[pos] = nuevaCadena;
                    Console.WriteLine();
                    break;

                case "O":
                    lista.Sort();
                    Console.WriteLine();
                    break;

                case "S": Console.WriteLine("Adiós.");break;

                default:
                    Console.WriteLine("Error.");
                    break;
            }


        } while (opcion != "S");

        //al salir escribimos todos los cambios en el fichero 
        File.WriteAllLines(fichero, lista.ToArray());
    }
}
