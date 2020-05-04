namespace Ejercicio463versionb
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.tbNum1 = new System.Windows.Forms.TextBox();
            this.tbNum2 = new System.Windows.Forms.TextBox();
            this.cbZero = new System.Windows.Forms.CheckBox();
            this.rbPan = new System.Windows.Forms.RadioButton();
            this.btPulsar = new System.Windows.Forms.Button();
            this.rbFichero = new System.Windows.Forms.RadioButton();
            this.SuspendLayout();
            // 
            // tbNum1
            // 
            this.tbNum1.Location = new System.Drawing.Point(361, 43);
            this.tbNum1.Name = "tbNum1";
            this.tbNum1.Size = new System.Drawing.Size(100, 20);
            this.tbNum1.TabIndex = 0;
            this.tbNum1.Text = "1";
            this.tbNum1.TextAlign = System.Windows.Forms.HorizontalAlignment.Right;
            // 
            // tbNum2
            // 
            this.tbNum2.Location = new System.Drawing.Point(361, 101);
            this.tbNum2.Name = "tbNum2";
            this.tbNum2.Size = new System.Drawing.Size(100, 20);
            this.tbNum2.TabIndex = 1;
            this.tbNum2.Text = "10";
            this.tbNum2.TextAlign = System.Windows.Forms.HorizontalAlignment.Right;
            // 
            // cbZero
            // 
            this.cbZero.AutoSize = true;
            this.cbZero.Checked = true;
            this.cbZero.CheckState = System.Windows.Forms.CheckState.Checked;
            this.cbZero.Location = new System.Drawing.Point(361, 158);
            this.cbZero.Name = "cbZero";
            this.cbZero.Size = new System.Drawing.Size(85, 17);
            this.cbZero.TabIndex = 2;
            this.cbZero.Text = "incluye el 0?";
            this.cbZero.UseVisualStyleBackColor = true;
            // 
            // rbPan
            // 
            this.rbPan.AutoSize = true;
            this.rbPan.Location = new System.Drawing.Point(361, 208);
            this.rbPan.Name = "rbPan";
            this.rbPan.Size = new System.Drawing.Size(63, 17);
            this.rbPan.TabIndex = 3;
            this.rbPan.Text = "Pantalla";
            this.rbPan.UseVisualStyleBackColor = true;
            // 
            // btPulsar
            // 
            this.btPulsar.Location = new System.Drawing.Point(361, 297);
            this.btPulsar.Name = "btPulsar";
            this.btPulsar.Size = new System.Drawing.Size(100, 23);
            this.btPulsar.TabIndex = 4;
            this.btPulsar.Text = "Pulsar";
            this.btPulsar.UseVisualStyleBackColor = true;
            this.btPulsar.Click += new System.EventHandler(this.btPulsar_Click);
            // 
            // rbFichero
            // 
            this.rbFichero.AutoSize = true;
            this.rbFichero.Checked = true;
            this.rbFichero.Location = new System.Drawing.Point(361, 245);
            this.rbFichero.Name = "rbFichero";
            this.rbFichero.Size = new System.Drawing.Size(60, 17);
            this.rbFichero.TabIndex = 5;
            this.rbFichero.TabStop = true;
            this.rbFichero.Text = "Fichero";
            this.rbFichero.UseVisualStyleBackColor = true;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 450);
            this.Controls.Add(this.rbFichero);
            this.Controls.Add(this.btPulsar);
            this.Controls.Add(this.rbPan);
            this.Controls.Add(this.cbZero);
            this.Controls.Add(this.tbNum2);
            this.Controls.Add(this.tbNum1);
            this.Name = "Form1";
            this.Text = "Form1";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.TextBox tbNum1;
        private System.Windows.Forms.TextBox tbNum2;
        private System.Windows.Forms.CheckBox cbZero;
        private System.Windows.Forms.RadioButton rbPan;
        private System.Windows.Forms.Button btPulsar;
        private System.Windows.Forms.RadioButton rbFichero;
    }
}

