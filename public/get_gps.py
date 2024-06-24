import serial

# Definisi port serial
port = 'COM5'  # Ganti dengan port serial pertama Anda

# Pengaturan aliran
flow_control = 'software'  # Ganti dengan 'hardware' atau 'software' sesuai kebutuhan

# Konfigurasi objek serial
if flow_control == 'hardware':
    ser = serial.Serial(port, baudrate=19200, timeout=1, rtscts=True)
elif flow_control == 'software':
    ser = serial.Serial(port, baudrate=19200, timeout=1, xonxoff=True)

def send_serial_data(ser, data):
    ser.write(data.encode())
    print("Data terkirim:", data)

try:
    # Contoh pengiriman data
    send_serial_data(ser, "GPS;59dd53cb")
except KeyboardInterrupt:
    print("Keyboard interrupt, exiting...")
finally:
    ser.close()
