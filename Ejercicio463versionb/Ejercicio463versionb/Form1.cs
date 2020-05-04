//Dani Contreras
using System;
using System.IO;
using System.Windows.Forms;

namespace Ejercicio463versionb
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void btPulsar_Click(object sender, EventArgs e)
        {
            try
            {
                int num1 = Convert.ToInt32(tbNum1.Text);
                int num2 = Convert.ToInt32(tbNum2.Text);
                int mayor, menor;
                if (num1 >= num2)
                {
                    mayor = num1;
                    menor = num2;
                }
                else
                {
                    mayor = num2;
                    menor = num1;
                }

                if (rbPan.Checked)
                {
                    if (cbZero.Checked)
                    {
                        for (int i = menor; i <= mayor; i++)
                        {
                            for (int j = 0; j <= 10; j++)
                            {
                                MessageBox.Show(i + " x " + j + " = " + i * j + "\n");
                            }
                        }
                    }
                    else
                    {
                        for (int i = menor; i <= mayor; i++)
                        {
                            for (int j = 1; j <= 10; j++)
                            {
                                MessageBox.Show(i + " x " + j + " = " + i * j + "\n");
                            }
                        }
                    }
                }
                else if(rbFichero.Checked)
                {
                    string nomFichero = "tablas.txt";
                    StreamWriter fichero = new StreamWriter(nomFichero);
                    if (cbZero.Checked)
                    {
                        for (int i = menor; i <= mayor; i++)
                        {
                            for (int j = 0; j <= 10; j++)
                            {
                                fichero.Write(i + " x " + j + " = " + i * j + "\n");
                            }
                            fichero.Write("---------------" + "\n");
                        }
                    }
                    else
                    {
                        for (int i = menor; i <= mayor; i++)
                        {
                            for (int j = 1; j <= 10; j++)
                            {
                                fichero.Write(i + " x " + j + " = " + i * j + "\n");
                            }
                            fichero.Write("---------------" + "\n");
                        }
                    }
                    fichero.Close();
                    MessageBox.Show("Completado");
                }
                
            }
            catch (Exception ex)
            {

                MessageBox.Show("error: " + ex.Message);
            }
            
        }
    }
}
