/**
 * File: flood_analysis.cpp
 * Fungsi: Program analisis sederhana untuk menentukan status bahaya banjir
 * Compile: g++ flood_analysis.cpp -o flood_analysis
 * Run: ./flood_analysis
 */

#include <iostream>
#include <string>
using namespace std;

// Fungsi untuk menentukan status bahaya berdasarkan jumlah laporan
string analyzeFloodStatus(int totalReports) {
    if (totalReports >= 10) {
        return "SIAGA - Tingkat bahaya tinggi, segera lakukan evakuasi!";
    } else if (totalReports >= 5) {
        return "WASPADA - Tingkat bahaya sedang, persiapkan diri untuk evakuasi.";
    } else if (totalReports >= 1) {
        return "AMAN - Tingkat bahaya rendah, tetap waspada.";
    } else {
        return "NORMAL - Tidak ada laporan banjir.";
    }
}

// Fungsi untuk menghitung persentase wilayah terdampak
double calculateAffectedPercentage(int affectedAreas, int totalAreas) {
    if (totalAreas == 0) return 0.0;
    return (double)affectedAreas / totalAreas * 100.0;
}

int main() {
    cout << "========================================" << endl;
    cout << "  SISTEM ANALISIS BENCANA BANJIR" << endl;
    cout << "========================================" << endl;
    cout << endl;
    
    // Input data
    int totalReports, affectedAreas, totalAreas;
    
    cout << "Masukkan jumlah total laporan banjir: ";
    cin >> totalReports;
    
    cout << "Masukkan jumlah wilayah terdampak: ";
    cin >> affectedAreas;
    
    cout << "Masukkan jumlah total wilayah: ";
    cin >> totalAreas;
    
    cout << endl;
    cout << "========================================" << endl;
    cout << "  HASIL ANALISIS" << endl;
    cout << "========================================" << endl;
    
    // Analisis status bahaya
    string status = analyzeFloodStatus(totalReports);
    cout << "Status Bahaya: " << status << endl;
    
    // Hitung persentase wilayah terdampak
    double percentage = calculateAffectedPercentage(affectedAreas, totalAreas);
    cout << "Persentase Wilayah Terdampak: " << percentage << "%" << endl;
    
    // Rekomendasi
    cout << endl;
    cout << "REKOMENDASI:" << endl;
    if (totalReports >= 10) {
        cout << "- Segera lakukan evakuasi warga" << endl;
        cout << "- Aktifkan posko darurat bencana" << endl;
        cout << "- Koordinasi dengan BPBD dan instansi terkait" << endl;
    } else if (totalReports >= 5) {
        cout << "- Siapkan jalur evakuasi" << endl;
        cout << "- Pantau perkembangan situasi secara berkala" << endl;
        cout << "- Informasikan warga untuk bersiap" << endl;
    } else {
        cout << "- Tetap pantau kondisi cuaca" << endl;
        cout << "- Pastikan saluran drainase berfungsi baik" << endl;
        cout << "- Edukasi masyarakat tentang kesiapsiagaan bencana" << endl;
    }
    
    cout << endl;
    cout << "========================================" << endl;
    
    return 0;
}