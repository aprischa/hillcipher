/*
Nama program		: Program Hill Cipher
Nama				: Putri Nabila, Rahma Batari, Aprischa Nauva
NPM					: 140810180007, 140810180051, 140810180063
Tanggal Buat		: 26 September 2020
Deskripsi			: Program untuk mengenkripsi, mendekripsi, dan mencari kunci Hill Cipher dengan ukuran matriks 2x2
*/


//note:
/*Rumus
CipherText (Ct) = Pt x K
PlainText (Pt) = Ct x K^-1
Key (K)  = Pt^-1 x Ct 
*/


#include <iostream>
using namespace std;

typedef int matriks[5][5];

void isiMatriks(matriks& x, int nBaris, int nKolom){
	for (int i=0; i<nBaris; i++){
		for (int j=0; j<nKolom; j++) {
			cout<<"Data ke-["<<i+1<<","<<j+1 <<"] : "; 
			cin>>x[i][j];
		}
    }
}

void cetakMatriks(matriks x, int nBaris, int nKolom){
	for (int i=0; i<nBaris; i++) {
		for (int j=0; j<nKolom; j++) {
			cout<<" "<< x[i][j] << " ";
		}
		cout<<endl;
	}	
}

void kali (matriks x, matriks y, int nBaris, int nKolom){
int i,j,k;
matriks d;

	//inisiasi isi matriks perkalian anggotanya adalah 0
	for(i = 0; i < nBaris; ++i)
        for(j = 0; j < nKolom; ++j)
        {
            d[i][j]=0;
        }

    // Operasi Perkalian
    for(i = 0; i < nBaris; ++i)
        for(j = 0; j < nKolom; ++j)
            for(k = 0; k < nKolom; ++k)
            {
                d[i][j] += x[i][k] * y[k][j];
            }

    
    // Output
    cout << endl << "Hasil Matriks [2x1] : " << endl;

    for(i=0;i<2;i++){
		for(j=0;j<1;j++){
			d[i][j]%=26;
	        cout << "  " << d[i][j]<<" ";
		}
		cout<<endl<<endl;
	}

	cout<<endl;
	printf("Hasil : ");
	for(i=0;i<2;i++){
		for(j=0;j<1;j++){
			printf("%c",d[i][j]+'a');
		}
	}

	printf("\n");
	cout<<endl;

}

void keyKali (matriks x, matriks y, int nBaris, int nKolom){
int i,j,k;
matriks d;

	//inisiasi isi matriks perkalian anggotanya adalah 0
	for(i = 0; i < nBaris; ++i)
        for(j = 0; j < nKolom; ++j)
        {
            d[i][j]=0;
        }

    // Operasi Perkalian
    for(i = 0; i < nBaris; ++i)
        for(j = 0; j < nKolom; ++j)
            for(k = 0; k < nKolom; ++k)
            {
                d[i][j] += x[i][k] * y[k][j];
            }

    
    // Output
    for(i=0;i<2;i++){
		for(j=0;j<2;j++){
			d[i][j]%=26;
	        cout << "  " << d[i][j]<<" ";
		}
		cout<<endl<<endl;
	}


}

//Euclidean Algorithm untuk mendapatkan X
float gcd(int a, int b) {
    bool flag = false;
    if (b > a) {
        flag = true;
        swap(a, b);
    }

    int x = 1;
    int y = 0;
    int g = a;
    int r = 0;
    int s = 1;
    int t = b;

    while (t > 0) {
        int q = g / t;
        int u = x - q*r;
        int v = y - q*s;
        int w = g - q*t;
        x = r;
        y = s;
        g = t;
        r = u;
        s = v;
        t = w;
    }

    if (flag) {
        return y;
    } else {
        return x;
    }
}

float modDiv(int d) {
    int x = gcd(d, 26);

    x = (x < 0 ? x + 26 : x);
    return (x % 26);
}

void inverse(matriks x, matriks& y){

	int a = x[0][0];
	int b = x[0][1];
	int c = x[1][0];
	int d = x[1][1];

	int det = (a*d) - (b*c);
	
	int mod=modDiv(det);

	y[0][0] = (mod*d);
	y[0][1] = (mod*b*(-1));
	y[1][0] = (mod*c*(-1));
	y[1][1] = (mod*a);

	for (int i = 0; i < 2; i++)
	{
		for (int j = 0; j < 2; j++)
		{	
			y[i][j]%=26; 

			if(y[i][j] < 0){
				y[i][j]+=26; 
			}
		}
	}

	cetakMatriks(y,2,2);

}

void textToNumber(char text[], matriks& textMatrix){
int i,j;
	for(i=0;i<2;i++){
		for(j=0;j<1;j++){
			textMatrix[i][j]=text[i]-'a';
		}
	}

	cetakMatriks(textMatrix,2,1);
}

void newtextToNumber(char text[], matriks& textMatrix){

	textMatrix[0][0] = text[0]-'a';
	textMatrix[0][1] = text[2]-'a';
	textMatrix[1][0] = text[1]-'a';
	textMatrix[1][1] = text[3]-'a';

	cetakMatriks(textMatrix,2,2);
}

void enkripsi() {
  matriks x;          // variabel array x bertipe matriks
  matriks y;

  char text[10];


  cout<<"\t Enkripsi Hill Cipher\n";
  cout<<"----------------------------------------\n\n";
  cout<<"Masukkan plain text (2 Karakter) : "; cin>>(" %s",text);

  
  cout<<endl<<"Masukkan matriks kunci [2x2] : "<<endl;
  isiMatriks(x,2,2);cout<<endl;

  cout<<"\nMatriks Kunci [2x2] : "<<endl;
  cetakMatriks(x,2,2);

  cout<<"\nMatriks Plaintext [2x1] : "<<endl;
  textToNumber(text,y);

  kali(x,y,2,2);

}

void dekripsi() {
  matriks x;          // variabel array x bertipe matriks
  matriks y;
  matriks z;

  char text[10];


  cout<<"\t Dekripsi Hill Cipher\n";
  cout<<"----------------------------------------\n\n";
  cout<<"Masukkan cipher text (2 Karakter) : "; cin>>(" %s",text);

  
  cout<<"\nMasukkan matriks kunci [2x2] : "<<endl;
  isiMatriks(x,2,2);

  cout<<"\nMatriks Kunci [2x2] : "<<endl;
  cetakMatriks(x,2,2);

  cout<<"\nMatriks CipherText [2x1] : "<<endl;
  textToNumber(text,y);

  cout<<"\nInverse Matriks Key [2x2] : "<<endl;
  inverse(x,z);

  kali(z,y,2,2);
}

void kunciK(){

	matriks x,y,z;

	char pText[10];
	char cText[10];

	cout<<"\t Kunci Hill Cipher\n";
  	cout<<"-----------------------------------------------------\n\n";
	cout<<"Masukkan Plaintext (4 Karakter) : "; cin>>(" %s",pText);  	
	cout<<"Masukkan CipherText (4 Karakter) : "; cin>>(" %s",cText);

	cout<<"Matriks PlainText [2x2] : "<<endl;
  	newtextToNumber(pText,x);

	cout<<"Matriks CipherText [2x2] : "<<endl;
  	newtextToNumber(cText,y);

	cout<<"Invers Matriks PlainText [2x2] : "<<endl;
  	inverse(x,z);  	

  	cout<<"Matriks Key : "<<endl;
  	keyKali(z,y,2,2);

}


int main(){

	int pilih;
	char jawab;
	
	do{
		system("cls");
		cout<<"\t Program Algoritma Hill Cipher, m = 2"<<endl;
		cout<<"-----------------------------------------------------\n";
		cout<<"-----------------------------------------------------\n";
		cout<<endl;

		cout<<"Menu Program : "<<endl<<endl;
		cout<<"1. Enkripsi"<<endl;
		cout<<"2. Dekripsi"<<endl;
		cout<<"3. Mencari Kunci (K)"<<endl;
		cout<<"4. Keluar Program"<<endl<<endl;
		cout<<"Pilih Menu ( 1 / 2 / 3 / 4 ) : ";
		cin>>pilih;
		
		switch(pilih){
			case 1:
				system("cls");
				enkripsi();
				break;
			case 2:
				system("cls");
				dekripsi();
				break;
			case 3:
				system("cls");
				kunciK();
				break;
			case 4:
				cout<<"\nAkhir dari program, Terima Kasih! :)";
				return 0;
				break;
			default :
				cout<<"\nAngka tidak valid, silahkan ulangi!"<<endl<<endl;
				break;	
		}

		cout<<"Ingin mengulang? (Y/N) : "; cin>>jawab;

	}while(jawab=='y' || jawab=='Y' );
	
}
